<?php
class PluginafGuardGroupPeer extends BaseafGuardGroupPeer
{
	public static function getAllGroups()
	{
		return new Criteria();
	}

    public static function getAll($list = false) {

    	$c = new Criteria();

		$c->addAscendingOrderByColumn(self::NAME);

		if($list) {
			return $c;
		}

		$res = self::doSelect($c);

		$options = array();

		foreach($res as $p) {
			$options[$p->getId()] = $p->getName();
		}

		return $options;

	}

//	public static function getAll()
//	{
//		$timezones = self::doSelect(new Criteria());
//		$timezonesArray = array();
//
//		if(!is_null($timezonesArray))
//		{
//			foreach($timezones as $timezone)
//			{
//				$timezonesArray[$timezone->getId()] = htmlspecialchars($timezone->getName(),ENT_QUOTES );
//			}
//		}
//		return $timezonesArray;
//	}
//
//        public static function getAllForSelect()
//        {
//            $c = new Criteria();
//
//            $projectOwnerGroupId = ConfigPeer::get('project_owner_sf_guard_group_id');
//            if ($projectOwnerGroupId > 0) {
//                $c->add(self::ID, $projectOwnerGroupId, Criteria::NOT_EQUAL);
//            }
//
//            $objects = self::doSelect($c);
//
//            if($objects!=null)
//            {
//                foreach ($objects as $object)
//                {
//                    $array[$object->getId()] = $object->getName();
//                }
//
//                return $array;
//            } else {
//                return array();
//            }
//        }

	public static function isEditable(Array $args) {
//		if(sfContext::getInstance()->getUser()->hasCredential('role_edit')) {
			return true;
//		}else{
//			return false;
//		}
	}

//        public static function getProjectLeaderRoleId($throwExceptionOnError = true)
//        {
//            $c = new Criteria();
//            $c->add(ConfigPeer::NAME, 'project_owner_sf_guard_group_id');
//            $c->addJoin(ConfigPeer::VALUE, afGuardGroupPeer::ID);
//
//            $group = afGuardGroupPeer::doSelectOne($c);
//
//            if($throwExceptionOnError && !$group) {
//                throw new sfException("There is no project role marked as project leader");
//            } else if (!$group) {
//                return null;
//            }
//
//            return $group->getId();
//        }
//
//        public static function clearProjectOwnerRole()
//        {
//            ConfigPeer::set('project_owner_sf_guard_group_id', null);
//        }
}
