<?php

/**
 * Base actions for the afGuardPlugin afGuardPermission module.
 * 
 * @package     afGuardPlugin
 * @subpackage  afGuardPermission
 * @author      Your name here
 * @version     SVN: $Id: BaseActions.class.php 12534 2008-11-01 13:38:27Z Kris.Wallsmith $
 */
class BaseafGuardPermissionActions extends sfActions
{
    public function executeList($request)
    {
    }
    
    public function executeMassDelete()
    {
            
        if(afGuardUserPeer::deleteFromPeer(json_decode($this->getRequestParameter("selections")),"afGuardPermissionPeer")) {
            $result['message']= 'The selected permissions have been deleted';
            $result['success']= true;
            $result['reload'] = true;
        } else {
            $result['message']= 'Could not delete permissions';
            $result['success']= false;
        }
        
        return $result;
        
    }

	public function executeEditPermission(sfWebRequest $request)
	{
        $this->id = $this->getRequestParameter('id');
	}
	
	public function executeUpdate(sfWebRequest $request)
	{
		if($this->getRequest()->getMethod() === sfRequest::POST)
		{
			$new_permission = false;

            $formData = $request->getParameter('edit');
            $formData = $formData[0];
			if (!isset($formData['id']) || $formData['id'] < 1)
			{
				$af_guard_permission = new afGuardPermission();
				$new_permission = true;
			}
			else
			{
				$af_guard_permission = afGuardPermissionPeer::retrieveByPK($formData['id']);
				$this->forward404Unless($af_guard_permission);
			}

			$af_guard_permission->setName($formData['name']);
            $af_guard_permission->setDescription($formData['description']);

			$af_guard_permission->save();
			
			$result = array('success' => true, 'message' => 'Successfully saved your information!');
            return $result;
		}
	}

	public function executeDelete(sfWebRequest $request)
	{
		$c = new Criteria();
		$c->add(afGuardPermissionPeer::ID,$this->getRequestParameter('id'));

		$af_guard_permission = afGuardPermissionPeer::doSelectOne($c);

		if(!$af_guard_permission) {
			return array('success' => false, 'message' => 'Permission does not exist.', 'redirect' => "/afGuardPermission/listPermissions");
		}

		$af_guard_permission->delete();

		$result = array('success' => true, 'message' => 'The selected permission has been deleted successfully.');
		return $result;
	}

}
