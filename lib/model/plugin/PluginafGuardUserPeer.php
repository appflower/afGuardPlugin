<?php

//require_once(sfConfig::get('sf_plugins_dir'). '/appFlowerPlugin/lib/interface/AppFlowerUserQuery.interface.php');

class PluginafGuardUserPeer extends BaseafGuardUserPeer implements AppFlowerUserQuery
{
    public static function retrieveByUsername($username, $isActive = true)
    {
        $c = new Criteria();
        $c->add(self::USERNAME, $username);
        $c->add(self::IS_ACTIVE, $isActive);

        return self::doSelectOne($c);
    }
    public function findOneByUsername($username) {
        $c = new Criteria;
        $c->add(self::USERNAME, $username);
        return self::doSelectOne($c);
    }
    
	public static function getAllUsers()
	{
		$c = new Criteria();
//		$c->addJoin(self::ID,afGuardUserProfilePeer::USER_ID);
		return $c;
	}
	public static function isEditable(Array $args) {
//		if(sfContext::getInstance()->getUser()->hasCredential('user_list_edit')) {
			return true;
//		}else{
//			return false;
//		}
	}
    static function IsNewUserAllowed()
    {
        return true;
    }
    
}
