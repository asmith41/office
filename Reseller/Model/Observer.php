<?php
class Procab_Reseller_Model_Observer
{

    public function showOutOfStock($observer){
        Mage::helper('catalog/product')->setSkipSaleableCheck(true);
    }

}
?>