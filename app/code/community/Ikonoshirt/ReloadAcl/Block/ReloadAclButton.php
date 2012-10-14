<?php
class Ikonoshirt_ReloadAcl_Block_ReloadAclButton extends Mage_Adminhtml_Block_Widget_Button
{
    public function _construct()
    {
        $this->setLabel($this->__('Reload ACL'));
        $this->setStyle('margin-bottom: 10px;');
        $this->setOnClick('setLocation(\'' . $this->getUrl('adminhtml/dashboard', array('reloadAcl' => 1)) . '\')');

        $this->reloadAclIfNeeded();
    }

    /**
     * reloads the ACL if the param reloadAcl is 1
     */
    protected function reloadAclIfNeeded()
    {
        if ($this->getRequest()->getParam('reloadAcl') == 1) {
            /* @var $session Mage_Admin_Model_Session */
            $session = $adminuser = Mage::getSingleton('admin/session');
            /* @var $adminuser Mage_Admin_Model_User */
            $adminuser = $session->getUser();
            $adminuser->setReloadAclFlag(true);

            $session->refreshAcl();


            /* @var $session Mage_Adminhtml_Model_Session */
            $session = Mage::getSingleton('adminhtml/session');
            $session->addSuccess($this->__('ACL reloaded'));
        }
    }
}