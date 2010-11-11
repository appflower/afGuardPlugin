<?php
class PluginafGuardUserPeer extends BaseafGuardUserPeer implements AppFlowerUserQuery
{
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
