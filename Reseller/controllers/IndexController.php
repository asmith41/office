<?php

/**
 * @package Procab_Reseller
 * 
 */
class Procab_Reseller_IndexController extends Mage_Core_Controller_Front_Action
{
    
    public function indexAction() {
        $this->loadLayout();     
        $this->getLayout()->getBlock('head')->setTitle($this->__('Resellers'));
		$this->renderLayout();
    }
}