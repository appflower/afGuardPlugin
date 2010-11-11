<?php
class PluginafGuardGroupPermissionPeer extends BaseafGuardGroupPermissionPeer
{
	public static function deletePermissionGroups($pid)
	{
		$c = new Criteria();
		$c->add(afGuardGroupPermissionPeer::GROUP_ID, $pid);
		self::doDelete($c);
	}


	public static function getGroupPermissions($pid) {
		$c = new Criteria();

		$c->add(afGuardGroupPermissionPeer::GROUP_ID, $pid);
		$res = self::doSelectJoinafGuardPermission($c);

		$selected = $options = array();

		foreach($res as $p) {
			$selected[$p->getPermissionId()] = $p->getafGuardPermission()->getName();
		}

		$options = afGuardPermissionPeer::getAll();

		return array($options,$selected);

	}

//        public static function getForGroupId($groupId)
//        {
//            $c = new Criteria();
//            $c->add(self::GROUP_ID, $groupId);
//
//            return self::doSelectJoinafGuardPermission($c);
//        }
}
