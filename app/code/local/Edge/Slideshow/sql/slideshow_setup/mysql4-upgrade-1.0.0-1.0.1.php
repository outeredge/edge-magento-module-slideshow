<?php

$this->startSetup();
$this->getConnection()->addColumn(
    $this->getTable('slideshow/slideshow'),
    'from_date',
    'datetime NULL default NULL'
);

$this->getConnection()->addColumn(
    $this->getTable('slideshow/slideshow'),
    'to_date',
    'datetime NULL default NULL'
);

$this->endSetup();
