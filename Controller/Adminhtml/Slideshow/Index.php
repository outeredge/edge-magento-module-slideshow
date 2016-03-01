<?php
namespace Edge\Slideshow\Controller\Adminhtml\Slideshow;

class Index extends \Edge\Slideshow\Controller\Adminhtml\Slideshow
{
    public function execute()
    {
        $resultPage = $this->_initAction();
        $resultPage->getConfig()->getTitle()->prepend(__('QTV'));
        return $resultPage;
    }
}