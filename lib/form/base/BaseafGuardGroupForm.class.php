<?php

/**
 * afGuardGroup form base class.
 *
 * @method afGuardGroup getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseafGuardGroupForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                             => new sfWidgetFormInputHidden(),
      'name'                           => new sfWidgetFormInputText(),
      'description'                    => new sfWidgetFormTextarea(),
      'af_guard_group_permission_list' => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'afGuardPermission')),
      'af_guard_user_group_list'       => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'afGuardUser')),
    ));

    $this->setValidators(array(
      'id'                             => new sfValidatorPropelChoice(array('model' => 'afGuardGroup', 'column' => 'id', 'required' => false)),
      'name'                           => new sfValidatorString(array('max_length' => 255)),
      'description'                    => new sfValidatorString(array('required' => false)),
      'af_guard_group_permission_list' => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'afGuardPermission', 'required' => false)),
      'af_guard_user_group_list'       => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'afGuardUser', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'afGuardGroup', 'column' => array('name')))
    );

    $this->widgetSchema->setNameFormat('af_guard_group[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'afGuardGroup';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['af_guard_group_permission_list']))
    {
      $values = array();
      foreach ($this->object->getafGuardGroupPermissions() as $obj)
      {
        $values[] = $obj->getPermissionId();
      }

      $this->setDefault('af_guard_group_permission_list', $values);
    }

    if (isset($this->widgetSchema['af_guard_user_group_list']))
    {
      $values = array();
      foreach ($this->object->getafGuardUserGroups() as $obj)
      {
        $values[] = $obj->getUserId();
      }

      $this->setDefault('af_guard_user_group_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveafGuardGroupPermissionList($con);
    $this->saveafGuardUserGroupList($con);
  }

  public function saveafGuardGroupPermissionList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['af_guard_group_permission_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(afGuardGroupPermissionPeer::GROUP_ID, $this->object->getPrimaryKey());
    afGuardGroupPermissionPeer::doDelete($c, $con);

    $values = $this->getValue('af_guard_group_permission_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new afGuardGroupPermission();
        $obj->setGroupId($this->object->getPrimaryKey());
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
    $c->add(afGuardUserGroupPeer::GROUP_ID, $this->object->getPrimaryKey());
    afGuardUserGroupPeer::doDelete($c, $con);

    $values = $this->getValue('af_guard_user_group_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new afGuardUserGroup();
        $obj->setGroupId($this->object->getPrimaryKey());
        $obj->setUserId($value);
        $obj->save();
      }
    }
  }

}
