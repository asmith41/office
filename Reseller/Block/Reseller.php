<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Mage
 * @package     Procab_Reseller
 * @copyright   Copyright (c) 2014 Magento Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */


/**
 * Reseller block
 *
 * @category   Mage
 * @package    Procab_Reseller
 * @module     Reseller
 */
class Procab_Reseller_Block_Reseller extends Mage_Core_Block_Template
{
    /**
     * Prepare layout
     *
     * @return Procab_Reseller_Block_Result
     */
    protected function _prepareLayout()
    {
        return $this;
    }

    public function getResellers($countryId = NULL)     
	{ 
    	$collection = Mage::getModel('reseller/reseller')->getCollection()->setOrder('reseller_name', 'ASC')->addFieldToFilter('reseller_status', 1);
        if($countryId) {
            $collection->addFieldToFilter("reseller_country", $countryId);
        }
        if ($collection->getSize()):
            return $collection->getData();
        else:
            return false;
        endif;
	}

    public function getCountryList()     
    { 

        $collection = Mage::getModel('reseller/country')->getCollection()->setOrder('country_name', 'ASC')->addFieldToFilter('country_status', 1);
        if ($collection->getSize()):
            return $collection->getData();
        else:
            return false;
        endif;
    }

}