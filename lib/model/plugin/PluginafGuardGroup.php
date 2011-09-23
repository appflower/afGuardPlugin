<?php
class PluginafGuardGroup extends BaseafGuardGroup
{
    public function  __toString() {
        return $this->getName();
    }

	public function getHtmlName()
    {
        return '<a class="widgetLoad" href="'.sfContext::getInstance()->getController()->genUrl('/afGuardGroup/edit?id='.$this->getId(), true).'"> '.$this->getName().' </a>';
    }

    public function getIsProjectOwner()
    {
        $groupUserId = afGuardGroupPeer::getProjectLeaderRoleId(false);
        if($this->getId() == $groupUserId) {
            return true;
        } else {
            return false;
        }
    }

    public function setAsProjectOwner()
    {
        afGuardGroupPeer::clearProjectOwnerRole();
        ConfigPeer::set('project_owner_sf_guard_group_id', $this->getId());
    }
}
