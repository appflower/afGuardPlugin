<?php

require_once(sfConfig::get('sf_plugins_dir'). '/appFlowerPlugin/lib/interface/AppFlowerUser.interface.php');
require_once(sfConfig::get('sf_plugins_dir'). '/appFlowerPlugin/lib/interface/AppFlowerUser.interface.php');
require_once(sfConfig::get('sf_plugins_dir'). '/appFlowerPlugin/lib/interface/AppFlowerUserQuery.interface.php');

class PluginafGuardUser extends BaseafGuardUser implements AppFlowerUser
{
  protected
    $profile        = null,
    $groups         = null,
    $permissions    = null,
    $allPermissions = null;

  public function __toString()
  {
    return $this->getUsername();
  }

  public function setPassword($password)
  {
    if (!$password && 0 == strlen($password))
    {
      return;
    }

    if (!$salt = $this->getSalt())
    {
      $salt = md5(rand(100000, 999999).$this->getUsername());
      $this->setSalt($salt);
    }
    $algorithm = sfConfig::get('app_af_guard_plugin_algorithm_callable', 'sha1');
    $algorithmAsStr = is_array($algorithm) ? $algorithm[0].'::'.$algorithm[1] : $algorithm;
    if (!is_callable($algorithm))
    {
      throw new sfException(sprintf('The algorithm callable "%s" is not callable.', $algorithmAsStr));
    }
    $this->setAlgorithm($algorithmAsStr);

    parent::setPassword(call_user_func_array($algorithm, array($salt.$password)));
  }

//  public function setPasswordBis($password)
//  {
//  }

  public function checkPassword($password)
  {
    try
    {
      $profile = $this->getProfile();
    }
    catch (Exception $e)
    {
      $profile = null;
    }

    if (!is_null($profile) && method_exists($profile, 'checkPassword'))
    {
      return $profile->checkPassword($this->getUsername(), $password, $this);
    }
    else if ($callable = sfConfig::get('app_af_guard_plugin_check_password_callable'))
    {
      return call_user_func_array($callable, array($this->getUsername(), $password, $this));
    }
    else
    {
      return $this->checkPasswordByGuard($password);
    }
  }

  public function checkPasswordByGuard($password)
  {
    $algorithm = $this->getAlgorithm();
    if (false !== $pos = strpos($algorithm, '::'))
    {
      $algorithm = array(substr($algorithm, 0, $pos), substr($algorithm, $pos + 2));
    }
    if (!is_callable($algorithm))
    {
      throw new sfException(sprintf('The algorithm callable "%s" is not callable.', $algorithm));
    }

    return $this->getPassword() == call_user_func_array($algorithm, array($this->getSalt().$password));
  }

  public function getProfile()
  {
    if (!is_null($this->profile))
    {
      return $this->profile;
    }

    $profileClass = sfConfig::get('app_af_guard_plugin_profile_class', 'UserProfile');
    if (!class_exists($profileClass))
    {
      throw new sfException(sprintf('The user profile class "%s" does not exist.', $profileClass));
    }

    $fieldName = sfConfig::get('app_af_guard_plugin_profile_field_name', 'user_id');
    $profilePeerClass =  $profileClass.'Peer';

    // to avoid php segmentation fault
    class_exists($profilePeerClass);

    $foreignKeyColumn = call_user_func_array(array($profilePeerClass, 'translateFieldName'), array($fieldName, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_COLNAME));

    if (!$foreignKeyColumn)
    {
      throw new sfException(sprintf('The user profile class "%s" does not contain a "%s" column.', $profileClass, $fieldName));
    }

    $c = new Criteria();
    $c->add($foreignKeyColumn, $this->getId());

    $this->profile = call_user_func_array(array($profileClass.'Peer', 'doSelectOne'), array($c));

    if (!$this->profile)
    {
      $this->profile = new $profileClass();
      if (method_exists($this->profile, 'setafGuardUser'))
      {
        $this->profile->setafGuardUser($this);
      }
      else
      {
        $method = 'set'.call_user_func_array(array($profilePeerClass, 'translateFieldName'), array($fieldName, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME));
        $this->profile->$method($this->getId());
      }
    }

    return $this->profile;
  }

//  public function addGroupByName($name, $con = null)
//  {
//    $group = afGuardGroupPeer::retrieveByName($name);
//    if (!$group)
//    {
//      throw new Exception(sprintf('The group "%s" does not exist.', $name));
//    }
//
//    $ug = new afGuardUserGroup();
//    $ug->setafGuardUser($this);
//    $ug->setGroupId($group->getId());
//
//    $ug->save($con);
//  }
//
//  public function addPermissionByName($name, $con = null)
//  {
//    $permission = afGuardPermissionPeer::retrieveByName($name);
//    if (!$permission)
//    {
//      throw new Exception(sprintf('The permission "%s" does not exist.', $name));
//    }
//
//    $up = new afGuardUserPermission();
//    $up->setafGuardUser($this);
//    $up->setPermissionId($permission->getId());
//
//    $up->save($con);
//  }
//
//  public function hasGroup($name)
//  {
//    if (!$this->groups)
//    {
//      $this->getGroups();
//    }
//
//    return isset($this->groups[$name]);
//  }

  public function getGroups()
  {
    if (!$this->groups)
    {
      $this->groups = array();

      $c = new Criteria();
      $c->add(afGuardUserGroupPeer::USER_ID, $this->getId());
      $ugs = afGuardUserGroupPeer::doSelectJoinafGuardGroup($c);

      foreach ($ugs as $ug)
      {
        $group = $ug->getafGuardGroup();
        $this->groups[$group->getName()] = $group;
      }
    }

    return $this->groups;
  }

//  public function getGroupNames()
//  {
//    return array_keys($this->getGroups());
//  }
//
//  public function hasPermission($name)
//  {
//    if (!$this->permissions)
//    {
//      $this->getPermissions();
//    }
//
//    return isset($this->permissions[$name]);
//  }
//
  public function getPermissions()
  {
    if (!$this->permissions)
    {
      $this->permissions = array();

      $c = new Criteria();
      $c->add(afGuardUserPermissionPeer::USER_ID, $this->getId());
      $ups = afGuardUserPermissionPeer::doSelectJoinafGuardPermission($c);

      foreach ($ups as $up)
      {
        $permission = $up->getafGuardPermission();
        $this->permissions[$permission->getName()] = $permission;
      }
    }

    return $this->permissions;
  }

//  public function getPermissionNames()
//  {
//    return array_keys($this->getPermissions());
//  }

  // merge of permission in a group + permissions
  public function getAllPermissions()
  {
    if (!$this->allPermissions)
    {
      $this->allPermissions = $this->getPermissions();

      foreach ($this->getGroups() as $group)
      {
        foreach ($group->getafGuardGroupPermissionsJoinafGuardPermission() as $gp)
        {
          $permission = $gp->getafGuardPermission();

          $this->allPermissions[$permission->getName()] = $permission;
        }
      }
    }

    return $this->allPermissions;
  }

  public function getAllPermissionNames()
  {
    return array_keys($this->getAllPermissions());
  }

//  public function reloadGroupsAndPermissions()
//  {
//    $this->groups         = null;
//    $this->permissions    = null;
//    $this->allPermissions = null;
//  }
//
//  public function delete(PropelPDO $con = null)
//  {
//    // delete profile if available
//    try
//    {
//      if ($profile = $this->getProfile())
//      {
//        $profile->delete($con);
//      }
//    }
//    catch (sfException $e)
//    {
//    }
//
//    return parent::delete($con);
//  }
//
//  public function setPasswordHash($v)
//  {
//    if (!is_null($v) && !is_string($v))
//    {
//      $v = (string) $v;
//    }
//
//    if ($this->password !== $v)
//    {
//      $this->password = $v;
//      $this->modifiedColumns[] = afGuardUserPeer::PASSWORD;
//    }
//  }

  function  getFullname() {
        return $this->getUsername();
  }

  function  isWidgetHelpEnabled() {
      afWidgetHelpSettingsPeer::retrieveCurrent()->getIsWidgetHelpEnabled();
  }

  function  isAnonymous() {
        return false;
  }
}
