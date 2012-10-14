<?php
class Ikonoshirt_ReloadAcl_Model_Observer
{
    /**
     * Eventobserver for adding the ACL Button to the Layout
     *
     * Listening on `controller_action_postdispatch`
     */
    public function postDispatch($event)
    {
        return;
        $controller = $event->getControllerAction();
        /* @var $controller Mage_Core_Controller_Varien_Action */
        $contentBlock = $controller->getLayout()->getBlock('header');
        /* @var $contentBlock Mage_Core_Block_Abstract */
        $reloadAclButtonBlock = $controller->getLayout()->createBlock('ikonoshirt_reloadacl/reloadAclButton');
        $contentBlock->append($reloadAclButtonBlock);
    }
}
