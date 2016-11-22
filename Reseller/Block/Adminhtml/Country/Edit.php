<?php
class Procab_Reseller_Block_Adminhtml_Country_Edit extends Mage_Adminhtml_Block_Widget_Form_Container {
    public function _prepareLayout() {
        if (Mage::getSingleton('cms/wysiwyg_config')->isEnabled()) {
            $this->getLayout()->getBlock('head')->setCanLoadTinyMce(true);
            $this->getLayout()->getBlock('head')->setCanLoadExtJs(true);
            if ($head = $this->getLayout()->getBlock('head')) {
                $head->addItem('js', 'prototype/window.js')
                        ->addItem('js_css', 'prototype/windows/themes/default.css')
                        ->addCss('lib/prototype/windows/themes/magento.css')
                        ->addItem('js', 'mage/adminhtml/variables.js');
            }
            return parent::_prepareLayout();
        }
    }

    public function __construct() {

        $this->_objectId = "id";
        $this->_blockGroup = "reseller";
        $this->_controller = "adminhtml_country";
        $this->_mode = "edit";

        parent::__construct();

        $this->_updateButton('save', 'label', Mage::helper('reseller')->__('Save Country'));
        $this->_updateButton('delete', 'label', Mage::helper('reseller')->__('Delete Country'));

        $this->_addButton('saveandcontinue', array(
            'label' => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick' => 'saveAndContinueEdit()',
            'class' => 'save',
                ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('reseller_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'reseller_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'reseller_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText() {
        if (Mage::registry('reseller_data') && Mage::registry('country_data')->getId()) {
            return Mage::helper('reseller')->__("Edit Country '%s'", $this->htmlEscape(Mage::registry('country_data')->getCountryId()));
        } else {
            return Mage::helper('reseller')->__('Add Country');
        }
    }

}