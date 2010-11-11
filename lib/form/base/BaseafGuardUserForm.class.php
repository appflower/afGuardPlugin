<?php

/**
 * afGuardUser form base class.
 *
 * @method afGuardUser getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseafGuardUserForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                            => new sfWidgetFormInputHidden(),
      'username'                      => new sfWidgetFormInputText(),
      'algorithm'                     => new sfWidgetFormInputText(),
      'salt'                          => new sfWidgetFormInputText(),
      'password'                      => new sfWidgetFormInputText(),
      'created_at'                    => new sfWidgetFormDateTime(),
      'last_login'                    => new sfWidgetFormDateTime(),
      'is_active'                     => new sfWidgetFormInputCheckbox(),
      'is_super_admin'                => new sfWidgetFormInputCheckbox(),
      'af_guard_user_permission_list' => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'afGuardPermission')),
      'af_guard_user_group_list'      => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'afGuardGroup')),
    ));

    $this->setValidators(array(
      'id'                            => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'username'                      => new sfValidatorString(array('max_length' => 128)),
      'algorithm'                     => new sfValidatorString(array('max_length' => 128)),
      'salt'                          => new sfValidatorString(array('max_length' => 128)),
      'password'                      => new sfValidatorString(array('max_length' => 128)),
      'created_at'                    => new sfValidatorDateTime(array('required' => false)),
      'last_login'                    => new sfValidatorDateTime(array('required' => false)),
      'is_active'                     => new sfValidatorBoolean(),
      'is_super_admin'                => new sfValidatorBoolean(),
      'af_guard_user_permission_list' => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'afGuardPermission', 'required' => false)),
      'af_guard_user_group_list'      => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'afGuardGroup', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'afGuardUser', 'column' => array('username')))
    );

    $this->widgetSchema->setNameFormat('af_guard_user[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'afGuardUser';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['af_guard_user_permission_list']))
    {
      $values = array();
      foreach ($this->object->getafGuardUserPermissions() as $obj)
      {
        $values[] = $obj->getPermissionId();
      }

      $this->setDefault('af_guard_user_permission_list', $values);
    }

    if (isset($this->widgetSchema['af_guard_user_group_list']))
    {
      $values = array();
      foreach ($this->object->getafGuardUserGroups() as $obj)
      {
        $values[] = $obj->getGroupId();
      }

      $this->setDefault('af_guard_user_group_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveafGuardUserPermissionList($con);
    $this->saveafGuardUserGroupList($con);
  }

  public function saveafGuardUserPermissionList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['af_guard_user_permission_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(afGuardUserPermissionPeer::USER_ID, $this->object->getPrimaryKey());
    afGuardUserPermissionPeer::doDelete($c, $con);

    $values = $this->getValue('af_guard_user_permission_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new afGuardUserPermission();
        $obj->setUserId($this->object->getPrimaryKey());
        $obj->setPermissionId($value);
        $obj->save();
      }
    }
  }

  public function saveafGuardUserGroupList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['af_guard_user_group_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(afGuardUserGroupPeer::USER_ID, $this->object->getPrimaryKey());
    afGuardUserGroupPeer::doDelete($c, $con);

    $values = $this->getValue('af_guard_user_group_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new afGuardUserGroup();
        $obj->setUserId($this->object->getPrimaryKey());
        $obj->setGroupId($value);
        $obj->save();
      }
    }
  }

}
