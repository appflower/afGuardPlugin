<?php
class PluginafGuardPermission extends BaseafGuardPermission
{
    
    public function getHtmlName()
    {
        return '<a class="widgetLoad" href="'.sfContext::getInstance()->getController()->genUrl('/afGuardPermission/editPermission?id='.$this->getId(), true).'"> '.$this->getName().' </a>';
    }
    
}