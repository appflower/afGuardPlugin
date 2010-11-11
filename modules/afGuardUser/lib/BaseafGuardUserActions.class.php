<?php
class BaseafGuardUserActions extends sfActions
{
//	public function executeRegenerate() {
//
//		return sfView::NONE;
//
//	}
//
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
//		return $this->redirect('afGuardUser/listUser');
//	}
//
//
	public function executeList($request)
	{
    }

	public function executeEdit(sfWebRequest $request)
	{
		if($this->getRequestParameter("id")) {
			$tmp = afGuardUserPeer::retrieveByPK($this->getRequestParameter("id"));
		}

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

			$result = array('success' => true, 'message' => 'Successfully saved your information! ');
			$result = json_encode($result);
			return $this->renderText($result);
		}


		$this->id = $this->getRequestParameter('id','');
		return XmlParser::layoutExt($this);
	}

//	public function executeListActionsRemoveUser(){
//		//If no additional operations is to be performed use this block #################
//		/*if($this->getRequest()->getMethod() == sfRequest::POST)
//		{
//			$post = $this->getRequest()->getParameterHolder()->getAll();
//			return $this->renderText(Util::listActionsRemove("NetRoutePeer",$post,"/appliance_system/listNetworkStaticRoute"));
//		}*/
//		// ##############################################################################
//		if($this->getRequest()->getMethod() == sfRequest::POST)
//		{
//			$post = $this->getRequest()->getParameterHolder()->getAll();
//			if(isset($post['all'])){
//				//Additional action to perfom: delete runtime route...............................
//				$c = new Criteria();
//				$c->addJoin(afGuardUserPeer::ID, afGuardUserProfilePeer::USER_ID);
//
//				$sf_guard_users = afGuardUserPeer::doSelect($c);
//				foreach($sf_guard_users as $sf_guard_user){
//					if($sf_guard_user->getUsername() != "admin"){
//						// Delete the user from db.
//						$sf_guard_user->delete();
//					}
//				}
//
//				$msg = "All data removed successfully";
//			}else{
//				$items = json_decode($post["selections"],true);
//				if(!count($items)){
//					$result = array('success' => false,'message'=>'No items selected..');
//					$result = json_encode($result);
//					return $this->renderText($result);
//				}
//				foreach ($items as $item){
//					// Delete individual
//					preg_match("/id=([0-9]+)/",$item['action1'],$matches);
//					$id = preg_replace("/id=([0-9]+)/","$1",$matches[0]);
//					$c = new Criteria();
//					$c->add(afGuardUserPeer::ID,$id);
//					$c->addJoin(afGuardUserPeer::ID, afGuardUserProfilePeer::USER_ID);
//
//					$sf_guard_user = afGuardUserPeer::doSelectOne($c);
//
//					$this->forward404Unless($sf_guard_user);
//
//					// Delete the user from db.
//					$sf_guard_user->delete();
//				}
//				$msg = "Selected data removed successfully";
//			}
//
//			$result = array('success' => true, 'message' => $msg, 'redirect' => "/afGuardUser/listUser");
//			$result = json_encode($result);
//			return $this->renderText($result);
//
//		}
//	}
//	public function executeListActionsUserStatus(){
//		if($this->getRequest()->getMethod() == sfRequest::POST)
//		{
//			$post = $this->getRequest()->getParameterHolder()->getAll();
//			$items = json_decode($post["selections"],true);
//			if(!count($items)){
//				$result = array('success' => true,'message'=>'No items selected..');
//				$result = json_encode($result);
//				return $this->renderText($result);
//			}
//			foreach ($items as $item){
//				preg_match("/id=([0-9]+)/",$item['action1'],$matches);
//				$id = preg_replace("/id=([0-9]+)/","$1",$matches[0]);
//				$c = new Criteria();
//				$c->add(afGuardUserPeer::ID,$id);
//				$user = afGuardUserPeer::doSelectOne($c);
//				$user_old = clone $user;
//				if(isset($post['activate'])){
//					$what = "activated";
//					$user->setIsActive(true);
//				}
//				if(isset($post['deactivate'])){
//					$what = "deactivated";
//					$user->setIsActive(false);
//				}
//
//				$user->save();
//				// audit log
//				myLogger::logUpdateObject($user_old, $user, '/afGuardUser/editUser?id='.$user->getId(), $user->getUsername(), $this->getUser()->getGuardUser());
//			}
//
//			$result = array('success' => true, 'message' => 'The selected users(s) are '.$what.' successfully.', 'redirect' => "/afGuardUser/listUser");
//			$result = json_encode($result);
//			return $this->renderText($result);
//		}
//	}
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

		$result = array('success' => true, 'message' => 'The selected user deleted successfully.', 'redirect' => "/afGuardUser/list");
		$result = json_encode($result);
		return $this->renderText($result);
	}


}
