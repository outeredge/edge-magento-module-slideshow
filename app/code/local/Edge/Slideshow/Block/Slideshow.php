<?php

class Edge_Slideshow_Block_Slideshow extends Mage_Core_Block_Template
{
    public function getSlideshow()
    {
        return Mage::getModel('slideshow/slideshow')
            ->getCollection()
            ->setOrder('sort_order', 'ASC');
    }
}