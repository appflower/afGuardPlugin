<?php
class afGuardAddGroupTask extends sfPropelBaseTask
{
  /**
   * @see sfTask
   */
  protected function configure()
  {
    $this->addArguments(array(
      new sfCommandArgument('username', sfCommandArgument::REQUIRED, 'The user name'),
      new sfCommandArgument('group', sfCommandArgument::REQUIRED, 'The group name'),
    ));

    $this->addOptions(array(
      new sfCommandOption('application', null, sfCommandOption::PARAMETER_OPTIONAL, 'The application name', null),
      new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
      new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'propel'),
    ));

    $this->namespace = 'guard';
    $this->name = 'add-group';
    $this->briefDescription = 'Adds a group to a user';

    $this->detailedDescription = <<<EOF
The [guard:add-group|INFO] task adds a group to a user:

  [./symfony guard:add-group fabien admin|INFO]

The user and the group must exist in the database.
EOF;
  }

  /**
   * @see sfTask
   */
  protected function execute($arguments = array(), $options = array())
  {
    $databaseManager = new sfDatabaseManager($this->configuration);

    $user = afGuardUserPeer::retrieveByUsername($arguments['username']);
    if (!$user)
    {
      throw new sfCommandException(sprintf('User "%s" does not exist.', $arguments['username']));
    }

    $user->addGroupByName($arguments['group']);

    $this->logSection('guard', sprintf('Add group %s to user %s', $arguments['group'], $arguments['username']));
  }
}
