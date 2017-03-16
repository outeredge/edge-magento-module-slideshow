<?php

class Edge_Slideshow_Block_Slideshow extends Mage_Core_Block_Template
{
    public function getSlideshow()
    {
        return Mage::getModel('slideshow/slideshow')
            ->getCollection()
            ->addFieldToFilter('from_date', array(array('lteq' => date('Y-m-d')), array('null' => 1)))
            ->addFieldToFilter('to_date', array(array('gteq' => date('Y-m-d')), array('null' => 1)))
            ->setOrder('sort_order', 'ASC');
    }
}