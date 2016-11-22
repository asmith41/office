<?php
class Procab_Reseller_Model_Mysql4_Country extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init("reseller/country", "country_id");
    }
}