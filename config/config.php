<?php

if (sfConfig::get('app_af_guard_plugin_routes_register', true) && in_array('afGuardAuth', sfConfig::get('sf_enabled_modules', array())))
{
  $this->dispatcher->connect('routing.load_configuration', array('afGuardRouting', 'listenToRoutingLoadConfigurationEvent'));
}

/**
 * setting the layout
 */
sfConfig::set('symfony.view.afGuardAuth_signin_layout', sfConfig::get('sf_plugins_dir').'/afGuardPlugin/templates/layout');
sfConfig::set('symfony.view.afGuardAuth_passwordRequest_layout', sfConfig::get('sf_plugins_dir').'/afGuardPlugin/templates/layout');
sfConfig::set('symfony.view.afGuardAuth_passwordReset_layout', sfConfig::get('sf_plugins_dir').'/afGuardPlugin/templates/layout');

foreach (array('afGuardUser', 'afGuardGroup', 'afGuardPermission') as $module)
{      
  if (in_array($module, sfConfig::get('sf_enabled_modules')))
  {
    $this->dispatcher->connect('routing.load_configuration', array('afGuardRouting', 'addRouteForAdmin'.str_replace('afGuard', '', $module)));
  }
}
