<?php
    class Procab_Reseller_Model_Mysql4_Country_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
    {

		public function _construct(){
			$this->_init("reseller/country");
		}
    }	 