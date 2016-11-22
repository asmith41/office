<?php

class Procab_Reseller_Block_Adminhtml_Country_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('country_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('reseller')->__('Country Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('reseller')->__('Country Information'),
          'title'     => Mage::helper('reseller')->__('Country Information'),
          'content'   => $this->getLayout()->createBlock('reseller/adminhtml_country_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}