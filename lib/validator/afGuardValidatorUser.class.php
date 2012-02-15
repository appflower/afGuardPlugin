<?php

/**
*
* @package afGuardPlugin
* @author Radu Topala <radu@appflower.com>
*/
class afGuardValidatorUser extends sfValidatorBase
{
  public function configure($options = array(), $messages = array())
  {
    $this->addOption('username_field', 'username');
    $this->addOption('password_field', 'password');
    $this->addOption('rememeber_checkbox', 'remember');
    $this->addOption('throw_global_error', false);

    $this->setMessage('invalid', 'The email and/or password is invalid.');
  }

  protected function doClean($values)
  {
    $username = isset($values[$this->getOption('username_field')]) ? $values[$this->getOption('username_field')] : '';
    $password = isset($values[$this->getOption('password_field')]) ? $values[$this->getOption('password_field')] : '';
    $remember = isset($values[$this->getOption('rememeber_checkbox')]) ? $values[$this->getOption('rememeber_checkbox')] : '';

    // user exists?
    if ($user = afGuardUserPeer::retrieveByUsername($username))
    {
      // password is ok?
      if ($user->checkPassword($password))
      {
        return array_merge($values, array('user' => $user));
      }
    }

    if ($this->getOption('throw_global_error'))
    {
      throw new sfValidatorError($this, 'invalid');
    }

    throw new sfValidatorErrorSchema($this, array($this->getOption('username_field') => new sfValidatorError($this, 'invalid')));
  }
}