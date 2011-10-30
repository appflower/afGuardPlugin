<?php
class PluginafGuardUserGroupPeer extends BaseafGuardUserGroupPeer
{
    public static function deleteUserGroups($uid)
    {
		$c = new Criteria();
		$c->add(afGuardUserGroupPeer::USER_ID, $uid);
		self::doDelete($c);
	}


	public static function getGroupUsers($uid) {
		$c = new Criteria();

		$c->add(afGuardUserGroupPeer::USER_ID, $uid);
		$res = self::doSelectJoinafGuardGroup($c);

		$selected = $options = array();

		foreach($res as $p) {
			$selected[$p->getGroupId()] = $p->getafGuardGroup()->getName();
		}

		$options = afGuardGroupPeer::getAll();

		return array($options,$selected);

	}
    
}