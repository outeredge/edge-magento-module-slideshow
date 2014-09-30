<?php

class Edge_Slideshow_Model_Resource_Slideshow extends Mage_Core_Model_Resource_Db_Abstract
{
    public function _construct()
    {
        $this->_init('slideshow/slideshow', 'id');
    }
}
