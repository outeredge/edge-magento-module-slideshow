<?php

class Edge_Slideshow_Model_Slideshow extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('slideshow/slideshow');
    }
}
