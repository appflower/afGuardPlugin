<?php

/**
 * afGuardPermission filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseafGuardPermissionFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'                           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description'                    => new sfWidgetFormFilterInput(),
      'af_guard_user_permission_list'  => new sfWidgetFormPropelChoice(array('model' => 'afGuardUser', 'add_empty' => true)),
      'af_guard_group_permission_list' => new sfWidgetFormPropelChoice(array('model' => 'afGuardGroup', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'name'                           => new sfValidatorPass(array('required' => false)),
      'description'                    => new sfValidatorPass(array('required' => false)),
      'af_guard_user_permission_list'  => new sfValidatorPropelChoice(array('model' => 'afGuardUser', 'required' => false)),
      'af_guard_group_permission_list' => new sfValidatorPropelChoice(array('model' => 'afGuardGroup', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('af_guard_permission_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addafGuardUserPermissionListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(afGuardUserPermissionPeer::PERMISSION_ID, afGuardPermissionPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(afGuardUserPermissionPeer::USER_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(afGuardUserPermissionPeer::USER_ID, $value));
    }

    $criteria->add($criterion);
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

    $criteria->addJoin(afGuardGroupPermissionPeer::PERMISSION_ID, afGuardPermissionPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(afGuardGroupPermissionPeer::GROUP_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(afGuardGroupPermissionPeer::GROUP_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'afGuardPermission';
  }

  public function getFields()
  {
    return array(
      'id'                             => 'Number',
      'name'                           => 'Text',
      'description'                    => 'Text',
      'af_guard_user_permission_list'  => 'ManyKey',
      'af_guard_group_permission_list' => 'ManyKey',
    );
  }
}
