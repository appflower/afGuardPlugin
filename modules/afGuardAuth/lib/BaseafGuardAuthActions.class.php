<?php
class BaseafGuardAuthActions extends sfActions
{
  public function executeInsufficientCredentials()
  {  	
    $this->title = "Insufficient Credentials";
	$this->html = "<div style = 'padding:10px;text-align:center; font-weight:bold;height:100px; padding-top:30px;color:red'>You do not have sufficient credentials to view this page</div>";
  }	
  
	public function executeSignout($request)
	{
        $this->getUser()->signOut();

        $signoutUrl = sfConfig::get('app_sf_guard_plugin_success_signout_url', $request->getReferer());

        $this->redirect('' != $signoutUrl ? $signoutUrl : '@homepage');
	}
	public function executeSignin($request)
	{

		$user = $this->getUser();
        $captchaEnabled = in_array( 'sfCaptchaPlugin', sfProjectConfiguration::getActive()->getPlugins());

		if ($user->isAuthenticated())
		{
			return $this->redirect('@homepage');
		}

		if ($request->isMethod('post'))
		{
			if($request->hasParameter('signin'))
			{
				$signin=$request->getParameter('signin');

                if ($captchaEnabled) {
                    $wasCaptchaNeeded = afRateLimit::isCaptchaNeeded($request);
                    $captcha = ( isset($signin['captcha']) ? $signin['captcha'] : null);
                    if(!afRateLimit::verifyCaptchaIfNeeded($request, $captcha)){
                        return array('success' => false,'message'=>'The captcha verification failed!', 'redirect'=>'/login', 'load'=>'page');
                    }
                }

                $afUserQuery = ProjectConfiguration::getActive()->getAppFlowerUserQuery();
				$user = $afUserQuery->findOneByUsername($signin['username']);

				// user exists?
				if ($user)
				{
					// password is ok?
					//Now the user is valid
					if ($user->checkPassword($signin['password']) && $user->getIsActive())
					{
						//success

						$this->getUser()->signin($user, array_key_exists('remember', $signin) ? (($signin['remember']=='on')?true:false) : false);

						/**
						 * redirect to the referer page, or to @homepage, if no referer
						 *
						 * @author radu
						 */
						$signinUrl = sfConfig::get('app_af_guard_plugin_success_signin_url', $request->getReferer());
						$signinUrl = ($signinUrl != null) ? $signinUrl : url_for('@homepage');

						$result = array('success' => true/*,'message'=>'You have logged in succesfuly ! You\'ll be redirected now...'*/,'redirect'=>$signinUrl,'load'=>'page');
						$result = json_encode($result);
						return $this->renderText($result);
					}
					else
					{
						$result = array('success' => false,'message'=>'The username and/or password is invalid. ! Please try again !');
                        if ($captchaEnabled) {
                            afRateLimit::rememberSin($request);
                            if($wasCaptchaNeeded || afRateLimit::isCaptchaNeeded($request)) {
                                $result['redirect'] = '/login';
                                $result['load'] = '/page';
                            }
                        }
						$result = json_encode($result);
						return $this->renderText($result);
					}
				}
				else
				{
                    if ($captchaEnabled) {
                        afRateLimit::rememberSin($request);
                    }
					$result = array('success' => false,'message'=>'The username and/or password is invalid. ! Please try again !','redirect'=>'/login','load'=>'page');
					$result = json_encode($result);
					return $this->renderText($result);
				}
			}
			else {
				if($request->hasParameter('limit')&&$request->hasParameter('start'))
				{
					$result['success']=true;
					$result['totalCount']=1;
					$result['rows'][]=array('message'=>'You were logged out ! You\'ll be redirected to the login page!','redirect'=>'/login','load'=>'page');
				}
				else {
					$result = array('success' => false,'message'=>'You were logged out ! You\'ll be redirected to the login page!','redirect'=>'/login','load'=>'page');
				}
				$result = json_encode($result);
				return $this->renderText($result);
			}
		}
		else
		{
			// if we have been forwarded, then the referer is the current URL
			// if not, this is the referer of the current request
			$user->setReferer($this->getContext()->getActionStack()->getSize() > 1 ? $request->getUri() : $request->getReferer());

			$module = sfConfig::get('sf_login_module');
			if ($this->getModuleName() != $module)
			{
				$result = array('success' => false,'message'=>'You were logged out ! You\'ll be redirected to the login page!','redirect'=>'/login','load'=>'page');
				$result = json_encode($result);
				return $this->renderText($result);
			}
		}
	}

	/**
	 * Execute Password Request action
	 *
	 */
	public function executePasswordRequest()
	{
		if ($this->getRequest()->getMethod() != sfRequest::POST)
		{
			// display the form
			return sfView::SUCCESS;
		}

		// handle the form submission
		$c = new Criteria();
		$c->add(afGuardUserPeer::USERNAME, $this->getRequestParameter('email'));
		$user = afGuardUserPeer::doSelectOne($c);

		// email exists?
		if ($user)
		{

                        if ($user->getUsername()) {
                            $parameters = array(
                                'userObj'  => $user,
                                'email'    => $user->getUsername(),
                                'subject'  => sfConfig::get('app_afGuardPlugin_subject'),
                                'from'     => sfConfig::get('app_afGuardPlugin_from'),
                            	'validate' => md5($user->getSalt().$user->getPassword())
                            );

                            afAutomailer::saveMail('afGuardAuth', 'sendPasswordResetConfirmation', $parameters);
                        }


			sfProjectConfiguration::getActive()->loadHelpers(array("Url","Tag"));
			$result = array('success' => true,'message'=>'Confirmation message has been sent to the email address associated with this account. ');

		}
		else
		{
			$result = array('success' => false,'message'=>'There is no user with this email address. Please try again!');
		}

		$result = json_encode($result);
		return $this->renderText($result);
	}

	public function executePasswordReset()
	{
		$c = new Criteria();
		$c->add(afGuardUserPeer::ID, $this->getRequestParameter('uid'));
		$user = afGuardUserPeer::doSelectOne($c);
		
		// user exist and validate code is correct
		if($user && $this->getRequestParameter('validate')==md5($user->getSalt().$user->getPassword()))
		{
			
			if ($this->getRequest()->getMethod() == sfRequest::POST)
			{
				if ($this->getRequestParameter('password')!=$this->getRequestParameter('confirm_password'))
				{
					
					$result = array('success' => false,'message'=>'The "Confirm Password" you entered does not match your original password.');
					
				}
				else 
				{
					
					$user->setPassword($this->getRequestParameter('password'));
					$user->save(); // save new password
					
					sfProjectConfiguration::getActive()->loadHelpers(array("Url","Tag"));
					$result = array('success' => true,'message'=>'You have successfully changed your password and you can proceed to the '.link_to('login page', '@af_guard_signin').'.');
				}
				
				$result = json_encode($result);
				return $this->renderText($result);
			}
			
			// display the form
			return sfView::SUCCESS;
		}
		
		// 'That confirmation code is invalid.'
		$this->setTemplate('passwordResetFailed');
		return sfView::SUCCESS;
	}
	
}