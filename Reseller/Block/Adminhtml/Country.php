<?php
class Procab_Reseller_Block_Adminhtml_Country extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_country';
    $this->_blockGroup = 'reseller';
    $this->_headerText = Mage::helper('reseller')->__('Country Manager');
    $this->_addButtonLabel = Mage::helper('reseller')->__('Add Country');
    parent::__construct();
  }
}