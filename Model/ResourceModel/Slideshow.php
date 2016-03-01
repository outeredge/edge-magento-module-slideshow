<?php
namespace Edge\Slideshow\Model\ResourceModel;

class Slideshow extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('slideshow', 'id');
    }
}