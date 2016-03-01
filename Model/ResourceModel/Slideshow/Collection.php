<?php
namespace Edge\Slideshow\Model\ResourceModel\Slideshow;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Edge\Slideshow\Model\Slideshow', 'Edge\Slideshow\Model\ResourceModel\Slideshow');
    }
}