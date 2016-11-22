<?php
/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;

$installer->startSetup();

    $installer->run("
        -- DROP TABLE IF EXISTS {$this->getTable('reseller_country')};
        CREATE TABLE IF NOT EXISTS {$this->getTable('reseller_country')} (
            `country_id` int( 11 ) unsigned NOT NULL AUTO_INCREMENT ,        
            `country_name` varchar( 255 ) NOT NULL default '',
            `country_code` varchar( 100) NOT NULL default '',
            `country_status` int( 11 ) unsigned NOT NULL default '0',           
            PRIMARY KEY ( `country_id` ) 
           
        ) ENGINE = InnoDB DEFAULT CHARSET = utf8;
");

$installer->endSetup();