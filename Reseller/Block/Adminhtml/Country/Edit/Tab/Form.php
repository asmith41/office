<?php

class Procab_Reseller_Block_Adminhtml_Country_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form {

    protected function _prepareForm() {
        $form = new Varien_Data_Form();
        $this->setForm($form);
        $wysiwygConfig = Mage::getSingleton('cms/wysiwyg_config')->getConfig(array(
            'add_variables' => false,
            'add_widgets' => false,
            'files_browser_window_url' => $this->getBaseUrl() . 'admin/cms_wysiwyg_images/index/'));
        $fieldset = $form->addFieldset('reseller_form', array('legend' => Mage::helper('reseller')->__('Country information')));

        $fieldset->addField('country_name', 'text', array(
            'label' => Mage::helper('reseller')->__('Country'),
            'class' => 'required-entry',
            'required' => true,
            'name' => 'country_name',
        ));

        $fieldset->addField('country_status', 'select', array(
            'label' => Mage::helper('reseller')->__('Status'),
            'name' => 'country_status',
            'values' => array(
                array(
                    'value' => 1,
                    'label' => Mage::helper('reseller')->__('Enabled'),
                ),
                array(
                    'value' => 2,
                    'label' => Mage::helper('reseller')->__('Disabled'),
                ),
            ),
        ));
               

        if (Mage::getSingleton('adminhtml/session')->getResellerData()) {
            $form->setValues(Mage::getSingleton('adminhtml/session')->getCountryData());
            Mage::getSingleton('adminhtml/session')->setCountryData(null);
        } elseif (Mage::registry('country_data')) {           
            $form->setValues(Mage::registry('country_data')->getData());                         
        }
        return parent::_prepareForm();
    }

}