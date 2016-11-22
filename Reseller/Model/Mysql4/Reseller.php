<?php
class Procab_Reseller_Model_Mysql4_Reseller extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init("reseller/reseller", "reseller_id");
    }
}