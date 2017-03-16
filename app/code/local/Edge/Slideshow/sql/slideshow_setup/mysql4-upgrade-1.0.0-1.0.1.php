<?php
$installer = $this;
$installer->startSetup();

$installer->run("
    ALTER TABLE {$this->getTable('slideshow/slideshow')}
        ADD `from_date` datetime NULL default NULL,
        ADD `to_date` datetime NULL default NULL;
    ");
$installer->endSetup();