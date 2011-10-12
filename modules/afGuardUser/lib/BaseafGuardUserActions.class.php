<?php
class BaseafGuardUserActions extends sfActions
{
	
	public function executeList($request)
	{
    }

	public function executeEdit(sfWebRequest $request)
	{
        $this->id = $this->getRequestParameter('id');
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

			$af_guard_user->setIsActive(isset($formData['is_active']) && $formData['is_active'] ? 1 : 0);
			$af_guard_user->save();
			
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
			return array('success' => false, 'message' => 'User not exist.', 'redirect' => "/afGuardUser/list");
		}

		// Delete the user from db.
		$af_guard_user->delete();

		$result = array('success' => true, 'message' => 'The selected user deleted successfully.', 'redirect' => '/afGuardUser/list', 'user' => $af_guard_user);
		return $result;
	}


}
