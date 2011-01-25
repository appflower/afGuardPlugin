<?php
class BaseafGuardUserActions extends sfActions
{
//	public function executeStatus()
//	{
//		$c = new Criteria();
//		$c->addJoin(afGuardUserPeer::ID, afGuardUserProfilePeer::USER_ID);
//		$c->add(afGuardUserProfilePeer::HASH, $this->getRequestParameter('hash'));
//		$sf_guard_user = afGuardUserPeer::doSelectOne($c);
//
//		$this->forward404Unless($sf_guard_user);
//
//		if($sf_guard_user->getIsActive())
//		{
//			$sf_guard_user->setIsActive(0);
//		}
//		else {
//			$sf_guard_user->setIsActive(1);
//		}
//
//		$sf_guard_user->save();
//
//		return $this->redirect('afGuardUser/list');
//	}
//
//
	public function executeList($request)
	{
    }

	public function executeEdit(sfWebRequest $request)
	{
		if($this->hasRequestParameter("id")) {
			$tmp = afGuardUserPeer::retrieveByPK($this->getRequestParameter("id"));
			$this->tid = $tmp->getProfile()->getTimezonesId();
			$this->customer_id = $tmp->getProfile()->getCustomerId();
			$this->job_title = $tmp->getProfile()->getJobTitle();
			$this->phone_mobile = $tmp->getProfile()->getPhoneMobile();
			$this->phone_office = $tmp->getProfile()->getPhoneOffice();
			$this->personal_body = $tmp->getProfile()->getPersonalBody();
			$this->picture = $tmp->getProfile()->getPicture();
			$this->beanstalk_user = $tmp->getProfile()->getBeanstalkUser();
		}else {
			$this->tid = "";
			$this->customer_id = "";
			$this->job_title = "";
			$this->phone_mobile = "";
			$this->phone_office = "";
			$this->personal_body = "";
			sfProjectConfiguration::getActive()->loadHelpers(array("Url","Tag","Thumbnail"));
			$this->picture = thumbnail_tag("images/anonymous.jpeg", 100, 100);;
			$this->beanstalk_user = "";
		}
		
		$this->id = $this->getRequestParameter('id','');

		return XmlParser::layoutExt($this);
	}
	
	public function executeUpdate(sfWebRequest $request)
	{
		if($this->getRequest()->getMethod() === sfRequest::POST)
		{
			$new_user = false;

            $formData = $request->getParameter('edit');
            $formData = $formData[0];
			if (!isset($formData['id']) || $formData['id'] < 1)
			{
                if (!afGuardUserPeer::isNewUserAllowed()) {
                    throw new Exception('New user could not be created.');
                }
				$af_guard_user = new afGuardUser();
				$new_user = true;
			}
			else
			{
				$af_guard_user = afGuardUserPeer::retrieveByPK($formData['id']);
				$this->forward404Unless($af_guard_user);
			}

			//audit log
			if(!$new_user)
			{
				$af_guard_user_old = clone $af_guard_user;
			}

			$af_guard_user->setUsername($formData['username']);

			// Change the password, if something is entered in the form.
			if( strlen($formData['guard_password']) > 0)
			{
				$af_guard_user->setPassword($formData['guard_password']);
			}

			$af_guard_user->setIsActive(isset($formData['is_active']) && $formData['is_active'] ? 1 : 0);
			$af_guard_user->save();
			
			if($new_user) {
				$user_profile = new UserProfile();
				$user_profile->setUserId($af_guard_user->getId());
				
				$user_profile->setEnAssignedTo(1);
				$user_profile->setEnReporter(1);
				$user_profile->setEnTicketUpdated(1);
				$user_profile->setEnDontSend(0);
			}else{
				$user_profile = UserProfilePeer::retrieveByPK($formData['id']);
			}
			$user_profile->setAllocatedTimePerWeek($formData['time_allocated_weekly']);
			$user_profile->setFirstName($formData['first_name']);
			$user_profile->setLastName($formData['last_name']);
			$user_profile->setJobTitle($formData['job_title']);
			$user_profile->setPhoneMobile($formData['phone_mobile']);
			$user_profile->setPhoneOffice($formData['phone_office']);
			$user_profile->setPersonalBody($formData['personal_body']);
			$user_profile->setCustomerId($formData['customer_id_value']);
			$user_profile->setBeanstalkUser($formData['beanstalk_user']);
			
			// Setting the time zone, defaults to GMT.
			if(!isset($formData['time_zones_id_value']) || $formData['time_zones_id_value'] < 1) {
				$user_profile->setTimeZonesId($gmt->getId());
			} else {
				$user_profile->setTimeZonesId($formData['time_zones_id_value']);
			}
			
			//profile picture
			if(isset($formData['delete_image']) && $formData['delete_image'] == 'on')
			{
				$user_profile->setProfilePicture('');
	        } else {
				$folder = $af_guard_user->getUploadDir();
				$filename=time().'_'.$_FILES["edit"]["name"]["0"]["profile_picture"];
				$path = $folder.'/'.$filename;
				$path2 = str_replace(sfConfig::get('sf_root_dir')."/web/",'',$path);
				$file = $_FILES["edit"]["tmp_name"]["0"]["profile_picture"];
	            $conf = frontendConfiguration::getActive();
	            if ($conf->isStorageSpaceAvailable()) {
	                if( move_uploaded_file($file, $path) ){
	                    $user_profile->setProfilePicture($path2);
	                }
	            } else {
	                $messageAddition = 'You can\'t upload files right now. Disk space limit exceeded.';
	            }
			}
			
			$user_profile->save();

			$result = array('success' => true, 'message' => 'Successfully saved your information!', 'user' => $af_guard_user);
            return $result;
		}
	}

	public function executeListActionsRemoveUser(){
		//If no additional operations is to be performed use this block #################
		/*if($this->getRequest()->getMethod() == sfRequest::POST)
		{
			$post = $this->getRequest()->getParameterHolder()->getAll();
			return $this->renderText(Util::listActionsRemove("NetRoutePeer",$post,"/appliance_system/listNetworkStaticRoute"));
		}*/
		// ##############################################################################
		if($this->getRequest()->getMethod() == sfRequest::POST)
		{
			$post = $this->getRequest()->getParameterHolder()->getAll();
			if(isset($post['all'])){
				//Additional action to perfom: delete runtime route...............................
				$c = new Criteria();

				$sf_guard_users = afGuardUserPeer::doSelect($c);
				foreach($sf_guard_users as $sf_guard_user){
					if($sf_guard_user->getUsername() != "admin"){
						// Delete the user from db.
						$sf_guard_user->delete();
					}
				}

				$msg = "All data removed successfully";
			}else{
				$items = json_decode($post["selections"],true);
				if(!count($items)){
					$result = array('success' => false,'message'=>'No items selected..');
					$result = json_encode($result);
					return $this->renderText($result);
				}
				foreach ($items as $item){
					// Delete individual
					preg_match("/id=([0-9]+)/",$item['action1'],$matches);
					$id = preg_replace("/id=([0-9]+)/","$1",$matches[0]);
					$c = new Criteria();
					$c->add(afGuardUserPeer::ID,$id);

					$sf_guard_user = afGuardUserPeer::doSelectOne($c);

					$this->forward404Unless($sf_guard_user);

					// Delete the user from db.
					$sf_guard_user->delete();
				}
				$msg = "Selected data removed successfully";
			}

			$result = array('success' => true, 'message' => $msg, 'redirect' => "/afGuardUser/list");
			$result = json_encode($result);
			return $this->renderText($result);

		}
	}

	public function executeListActionsUserStatus(){
		if($this->getRequest()->getMethod() == sfRequest::POST)
		{
			$post = $this->getRequest()->getParameterHolder()->getAll();
			$items = json_decode($post["selections"],true);
			if(!count($items)){
				$result = array('success' => true,'message'=>'No items selected..');
				$result = json_encode($result);
				return $this->renderText($result);
			}
			foreach ($items as $item){
				preg_match("/id=([0-9]+)/",$item['action1'],$matches);
				$id = preg_replace("/id=([0-9]+)/","$1",$matches[0]);
				$c = new Criteria();
				$c->add(afGuardUserPeer::ID,$id);
				$user = afGuardUserPeer::doSelectOne($c);
				if(isset($post['activate'])){
					$what = "activated";
					$user->setIsActive(true);
				}
				if(isset($post['deactivate'])){
					$what = "deactivated";
					$user->setIsActive(false);
				}

				$user->save();
			}

			$result = array('success' => true, 'message' => 'The selected users(s) are '.$what.' successfully.', 'redirect' => "/afGuardUser/list");
			$result = json_encode($result);
			return $this->renderText($result);
		}
	}

	public function executeDelete(sfWebRequest $request)
	{
		$c = new Criteria();
		$c->add(afGuardUserPeer::ID,$this->getRequestParameter('id'));

		$af_guard_user = afGuardUserPeer::doSelectOne($c);

		if(!$af_guard_user) {
			$result = array('success' => false, 'message' => 'User not exist.', 'redirect' => "/afGuardUser/list");
			$result = json_encode($result);
			return $this->renderText($result);
		}

		// Delete the user from db.
		$af_guard_user->delete();

		$result = array('success' => true, 'message' => 'The selected user deleted successfully.', 'redirect' => '/afGuardUser/list', 'user' => $af_guard_user);
		return $result;
	}


}
