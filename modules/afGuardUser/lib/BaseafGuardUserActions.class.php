<?php
class BaseafGuardUserActions extends sfActions
{
	
	public function executeList($request)
	{
    }
    
	public function executeEditUser(sfWebRequest $request)
	{
        $this->id = $this->getRequestParameter('id');
	}
    
    public function executeMassDelete()
    {
                
        if(afGuardUserPeer::deleteFromPeer(json_decode($this->getRequestParameter("selections")))) {
            $result['message']= 'The selected users have been deleted';
            $result['success']= true;  
            $result['reload']= true;
        } else {
            $result['message']= 'Could not delete users';
            $result['success']= false;
        }
        
        return $result;
        
    }
    
    public function executeSecure()
    {
        
        $root = sfAppLicationConfiguration::getActive()->getRootDir();
        $files = array("default" => "apps/frontend/config/security.yml","all" => "apps/frontend/modules/pages/config/security.yml");
        
        foreach($files as $k => $file) {
            $yaml = sfYaml::load($root."/".$file);
            $yaml[$k]["is_secure"] = !$yaml[$k]["is_secure"];
            $fp = fopen($root."/".$file,"wt");
            fwrite($fp,sfYaml::dump($yaml));
            fclose($fp);
        }
        
        $this->getUser()->signOut();
        
        $result['message']= 'The application has been '.($yaml[$k]["is_secure"] ? "secured" : "unsecured").'! Please <a href="/">click here</a> to proceed!';
        $result['success']= true;
        return $result;

    }
    
    public function executeActivate(sfWebRequest $request)
    {
        
        $af_guard_user = afGuardUserPeer::retrieveByPK($request->getParameter('id'));
        $af_guard_user->setIsActive($af_guard_user->getIsActive() ? 0 : 1);
        $af_guard_user->save();
        $result = array('success' => true, 'reload' => true, 'message' => 'User has been successfuly '.($af_guard_user->getIsActive() ? 'activated' : 'deactivated'), 'user' => $af_guard_user);
        return $result;
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
				$af_guard_user = new afGuardUser();
				$new_user = true;
			}
			else
			{
				$af_guard_user = afGuardUserPeer::retrieveByPK($formData['id']);
				$this->forward404Unless($af_guard_user);
			}

			$af_guard_user->setUsername($formData['username']);

			// Change the password, if something is entered in the form.
			if( strlen($formData['guard_password']) > 0)
			{
				$af_guard_user->setPassword($formData['guard_password']);
			}

			$af_guard_user->setIsActive($new_user || (isset($formData['is_active']) && $formData['is_active']) ? 1 : 0);
			$af_guard_user->save();
            
            // clear group data to save it again
    		afGuardUserGroupPeer::deleteUserGroups($af_guard_user->getId());

			// save groups
			$groups = explode(",",$formData['associated_af_guard_group']);

			if ($groups)
			{
				foreach ($groups as $id)
				{
					if($id) {
						$group = new afGuardUserGroup();
						$group->setUserId($af_guard_user->getId());
						$group->setGroupId($id);
						$group->save();
					}
						
				}
			}
			
			$result = array('success' => true, 'message' => 'Successfully saved your information!', 'user' => $af_guard_user);
            return $result;
		}
	}

	public function executeDelete(sfWebRequest $request)
	{
		$c = new Criteria();
		$c->add(afGuardUserPeer::ID,$this->getRequestParameter('id'));

		$af_guard_user = afGuardUserPeer::doSelectOne($c);

		if(!$af_guard_user) {
			return array('success' => false, 'message' => 'User not exist.', 'redirect' => "/afGuardUser/listUsers");
		}

		// Delete the user from db.
		$af_guard_user->delete();

		$result = array('success' => true, 'message' => 'The selected user deleted successfully.', 'reload' => 'true', 'user' => $af_guard_user);
		return $result;
	}


}
