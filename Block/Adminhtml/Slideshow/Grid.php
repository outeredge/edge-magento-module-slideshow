<?php

namespace Edge\Slideshow\Block\Adminhtml\Slideshow;

class Grid extends \Magento\Backend\Block\Widget\Grid\Container
{
    protected function _construct()
    {
        $this->_blockGroup = 'Edge Slideshow';
        $this->_controller = 'adminhtml_slideshow';
        $this->_headerText = __('Slideshow');
        $this->_addButtonLabel = __('Add New Slide');
        parent::_construct();
        $this->buttonList->add(
            'slideshow_apply',
            [
                'label' => __('Slideshow'),
                'onclick' => "location.href='" . $this->getUrl('slideshow/*/applySlide') . "'",
                'class' => 'apply'
            ]
        );
    }
}