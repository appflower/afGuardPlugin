<?php

class BaseafGuardGroupActions extends sfActions
{
	public function executeList()
	{
	}

	public function executeEdit()
	{

		$this->id = $this->getRequestParameter("id",0);

		if($this->getRequest()->getMethod() === sfRequest::POST) {
            $formData = $this->getRequestParameter('edit');
            $formData = $formData[0];

			$this->id = $formData['id'];
				
			if (!$this->id)
			{
				$af_guard_group = new afGuardGroup();
				$is_new=true;
			}
			else
			{
				$af_guard_group = afGuardGroupPeer::retrieveByPk($this->id);
				$this->forward404Unless($af_guard_group);
				$af_guard_group->setId($this->id);

				$is_new=false;

			}

			$af_guard_group->setName($formData['name']);
			$af_guard_group->setDescription($formData['description']);

			$af_guard_group->save();

			// clear group data to save it again
			afGuardGroupPermissionPeer::deletePermissionGroups($af_guard_group->getId());

			// save groups
			$groups = explode(",",$formData['associated_af_guard_group']);

			if ($groups)
			{
				foreach ($groups as $id)
				{
					if($id) {
						$group = new afGuardGroupPermission();
						$group->setPermissionId($id);
						$group->setGroupId($af_guard_group->getId());
						$group->save();
					}
						
				}
			}
				
			$result['message']= 'The permission group has been '.(($this->id) ? 'modified' : 'created!');
			$result['success']= true;
            $result['group'] = $af_guard_group;
            return $result;
		}
	}


	public function executeDelete()
	{
		$af_guard_group = afGuardGroupPeer::retrieveByPk($this->getRequestParameter('id'));
		$this->forward404Unless($af_guard_group);

		$af_guard_group->delete();

        $result['message']= 'The group has been deleted';
        $result['success']= true;
        $result['redirect']='afGuardGroup/list';
        $result['group'] = $af_guard_group;
        return $result;
	}
}
