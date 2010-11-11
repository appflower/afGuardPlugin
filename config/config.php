<?php

if (sfConfig::get('app_af_guard_plugin_routes_register', true) && in_array('afGuardAuth', sfConfig::get('sf_enabled_modules', array())))
{
  $this->dispatcher->connect('routing.load_configuration', array('afGuardRouting', 'listenToRoutingLoadConfigurationEvent'));
}

foreach (array('afGuardUser', 'afGuardGroup', 'afGuardPermission') as $module)
{
  if (in_array($module, sfConfig::get('sf_enabled_modules')))
  {
    $this->dispatcher->connect('routing.load_configuration', array('afGuardRouting', 'addRouteForAdmin'.str_replace('afGuard', '', $module)));
  }
}
