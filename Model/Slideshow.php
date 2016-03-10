<?php
namespace Edge\Slideshow\Model;

class Slideshow extends \Magento\Framework\Model\AbstractModel
{

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Edge\Slideshow\Model\ResourceModel\Slideshow');
    }
}