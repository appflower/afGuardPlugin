<?php

/**
 * afGuardUser filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseafGuardUserFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'username'                      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'algorithm'                     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'salt'                          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'password'                      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'                    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'last_login'                    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'is_active'                     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'is_super_admin'                => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'af_guard_user_permission_list' => new sfWidgetFormPropelChoice(array('model' => 'afGuardPermission', 'add_empty' => true)),
      'af_guard_user_group_list'      => new sfWidgetFormPropelChoice(array('model' => 'afGuardGroup', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'username'                      => new sfValidatorPass(array('required' => false)),
      'algorithm'                     => new sfValidatorPass(array('required' => false)),
      'salt'                          => new sfValidatorPass(array('required' => false)),
      'password'                      => new sfValidatorPass(array('required' => false)),
      'created_at'                    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'last_login'                    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'is_active'                     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'is_super_admin'                => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'af_guard_user_permission_list' => new sfValidatorPropelChoice(array('model' => 'afGuardPermission', 'required' => false)),
      'af_guard_user_group_list'      => new sfValidatorPropelChoice(array('model' => 'afGuardGroup', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('af_guard_user_filters[%s]');

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

    $criteria->addJoin(afGuardUserPermissionPeer::USER_ID, afGuardUserPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(afGuardUserPermissionPeer::PERMISSION_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(afGuardUserPermissionPeer::PERMISSION_ID, $value));
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

    $criteria->addJoin(afGuardUserGroupPeer::USER_ID, afGuardUserPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(afGuardUserGroupPeer::GROUP_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(afGuardUserGroupPeer::GROUP_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'afGuardUser';
  }

  public function getFields()
  {
    return array(
      'id'                            => 'Number',
      'username'                      => 'Text',
      'algorithm'                     => 'Text',
      'salt'                          => 'Text',
      'password'                      => 'Text',
      'created_at'                    => 'Date',
      'last_login'                    => 'Date',
      'is_active'                     => 'Boolean',
      'is_super_admin'                => 'Boolean',
      'af_guard_user_permission_list' => 'ManyKey',
      'af_guard_user_group_list'      => 'ManyKey',
    );
  }
}
