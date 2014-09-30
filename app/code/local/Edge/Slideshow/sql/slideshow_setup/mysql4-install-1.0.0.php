<?php

$this->startSetup();

// Slideshow
$this->run("
    CREATE TABLE IF NOT EXISTS {$this->getTable('slideshow/slideshow')} (
        `id` int(11) primary key NOT NULL auto_increment,
        `title` text NULL DEFAULT NULL,
        `description` text NULL DEFAULT NULL,
        `link` text NULL DEFAULT NULL,
        `image` text NULL DEFAULT NULL,
        `sort_order` int(11) NOT NULL DEFAULT '0'
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
");

$this->endSetup();