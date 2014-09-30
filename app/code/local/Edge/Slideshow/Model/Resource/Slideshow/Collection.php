<?php

class Edge_Slideshow_Model_Resource_Slideshow_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
	protected function _construct()
    {
        $this->_init('slideshow/slideshow');
    }
}