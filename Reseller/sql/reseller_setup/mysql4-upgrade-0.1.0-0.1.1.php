<?php
/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;

$installer->startSetup();

    $installer->run("
        -- DROP TABLE IF EXISTS {$this->getTable('reseller')};
        CREATE TABLE IF NOT EXISTS {$this->getTable('reseller')} (
            `reseller_id` int( 11 ) unsigned NOT NULL AUTO_INCREMENT,
            `reseller_name` varchar( 255 ) NOT NULL default '',        
            `reseller_country` int( 11 ) NOT NULL,
            `reseller_logo` varchar( 100 ) NOT NULL default '',
            `reseller_url` varchar (255) default '',
            `reseller_status` int( 11 ) unsigned NOT NULL default '1',           
            PRIMARY KEY ( `reseller_id` ) 
           
        ) ENGINE = InnoDB DEFAULT CHARSET = utf8;
");

$installer->endSetup();