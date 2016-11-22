<?php

class Procab_Reseller_Block_Adminhtml_Reseller_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('reseller_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('reseller')->__('Reseller Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('reseller')->__('Reseller Information'),
          'title'     => Mage::helper('reseller')->__('Reseller Information'),
          'content'   => $this->getLayout()->createBlock('reseller/adminhtml_reseller_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}