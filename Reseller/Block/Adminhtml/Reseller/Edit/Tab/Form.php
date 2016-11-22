<?php

class Procab_Reseller_Block_Adminhtml_Reseller_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form {

    protected function _prepareForm() {
        $form = new Varien_Data_Form();
        $this->setForm($form);
        $wysiwygConfig = Mage::getSingleton('cms/wysiwyg_config')->getConfig(array(
            'add_variables' => false,
            'add_widgets' => false,
            'files_browser_window_url' => $this->getBaseUrl() . 'admin/cms_wysiwyg_images/index/'));
        $fieldset = $form->addFieldset('reseller_form', array('legend' => Mage::helper('reseller')->__('Reseller information')));

        //get countries
        $countries = Mage::getModel('reseller/country')
                ->getCollection();
                // ->addAttributeToSelect('*')
                // ->addIsActiveFilter();

        $countryArray = array();
        foreach ($countries as $c) {
            $countryArray[] = array(
                'value' => $c->getCountryId(),
                'label' => $c->getCountryName());
        }

        $fieldset->addField('reseller_country', 'select', array(
            'label' => Mage::helper('reseller')->__('Country'),
            'name' => 'reseller_country',
            'values' => $countryArray,
        ));

        $fieldset->addField('reseller_name', 'text', array(
            'label' => Mage::helper('reseller')->__('Reseller Name'),
            'class' => 'required-entry',
            'required' => true,
            'name' => 'reseller_name',
        ));

        $fieldset->addField('reseller_logo', 'image', array(
            'label' => Mage::helper('reseller')->__('Logo'),
            'required' => true,
            'name' => 'reseller_logo',
            'note' => 'upload png logo of size (240 * 150 px)'
        ));

       // $fieldset->addType('image','Procab_Reseller_Block_Adminhtml_Reseller_Edit_Tab_Form_Helper_Image');

        $fieldset->addField('reseller_url', 'text', array(
            'label' => Mage::helper('reseller')->__('Url'),
            // 'class' => 'required-entry',
            'required' => false,
            'name' => 'reseller_url',
        ));

        $fieldset->addField('status', 'select', array(
            'label' => Mage::helper('reseller')->__('Status'),
            'name' => 'status',
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
            $form->setValues(Mage::getSingleton('adminhtml/session')->getResellerData());
            Mage::getSingleton('adminhtml/session')->setResellerData(null);
        } elseif (Mage::registry('reseller_data')) {           
            $form->setValues(Mage::registry('reseller_data')->getData());                         
        }
        return parent::_prepareForm();
    }

}