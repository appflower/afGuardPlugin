<?php
class PluginafGuardPermissionPeer extends BaseafGuardPermissionPeer
{

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

//	public static function isEditable(Array $args) {
//		if(sfContext::getInstance()->getUser()->hasCredential('permission_edit')) {
//			return true;
//		}else{
//			return false;
//		}
//	}
//
}
