<?php
class afGuardRouting
{
  /**
   * Listens to the routing.load_configuration event.
   *
   * @param sfEvent An sfEvent instance
   */
  static public function listenToRoutingLoadConfigurationEvent(sfEvent $event)
  {
    $r = $event->getSubject();

    // preprend our routes
    $r->prependRoute('af_guard_signin', new sfRoute('/login', array('module' => 'afGuardAuth', 'action' => 'signin')));
    $r->prependRoute('af_guard_signout', new sfRoute('/logout', array('module' => 'afGuardAuth', 'action' => 'signout')));
    $r->prependRoute('af_guard_password', new sfRoute('/request_password', array('module' => 'afGuardAuth', 'action' => 'password')));
  }

  static public function addRouteForAdminUser(sfEvent $event)
  {
    $event->getSubject()->prependRoute('af_guard_user', new sfPropelRouteCollection(array(
      'name'                 => 'af_guard_user',
      'model'                => 'afGuardUser',
      'module'               => 'afGuardUser',
      'prefix_path'          => 'af_guard_user',
      'with_wildcard_routes' => true,
      'requirements'         => array(),
    )));
  }

  static public function addRouteForAdminGroup(sfEvent $event)
  {
    $event->getSubject()->prependRoute('af_guard_group', new sfPropelRouteCollection(array(
      'name'                 => 'af_guard_group',
      'model'                => 'afGuardGroup',
      'module'               => 'afGuardGroup',
      'prefix_path'          => 'af_guard_group',
      'with_wildcard_routes' => true,
      'requirements'         => array(),
    )));
  }

  static public function addRouteForAdminPermission(sfEvent $event)
  {
    $event->getSubject()->prependRoute('af_guard_permission', new sfPropelRouteCollection(array(
      'name'                 => 'af_guard_permission',
      'model'                => 'afGuardPermission',
      'module'               => 'afGuardPermission',
      'prefix_path'          => 'af_guard_permission',
      'with_wildcard_routes' => true,
      'requirements'         => array(),
    )));
  }
}
