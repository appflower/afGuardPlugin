<?php

/**
 * afGuardGroup filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseafGuardGroupFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'                           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description'                    => new sfWidgetFormFilterInput(),
      'af_guard_group_permission_list' => new sfWidgetFormPropelChoice(array('model' => 'afGuardPermission', 'add_empty' => true)),
      'af_guard_user_group_list'       => new sfWidgetFormPropelChoice(array('model' => 'afGuardUser', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'name'                           => new sfValidatorPass(array('required' => false)),
      'description'                    => new sfValidatorPass(array('required' => false)),
      'af_guard_group_permission_list' => new sfValidatorPropelChoice(array('model' => 'afGuardPermission', 'required' => false)),
      'af_guard_user_group_list'       => new sfValidatorPropelChoice(array('model' => 'afGuardUser', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('af_guard_group_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addafGuardGroupPermissionListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(afGuardGroupPermissionPeer::GROUP_ID, afGuardGroupPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(afGuardGroupPermissionPeer::PERMISSION_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(afGuardGroupPermissionPeer::PERMISSION_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function addafGuardUserGroupListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(afGuardUserGroupPeer::GROUP_ID, afGuardGroupPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(afGuardUserGroupPeer::USER_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(afGuardUserGroupPeer::USER_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'afGuardGroup';
  }

  public function getFields()
  {
    return array(
      'id'                             => 'Number',
      'name'                           => 'Text',
      'description'                    => 'Text',
      'af_guard_group_permission_list' => 'ManyKey',
      'af_guard_user_group_list'       => 'ManyKey',
    );
  }
}
