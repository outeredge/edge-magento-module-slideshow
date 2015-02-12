<?php

class Edge_Slideshow_Adminhtml_SlideshowController extends Mage_Adminhtml_Controller_Action
{
    protected function _initAction()
    {
        $this->loadLayout()
            ->_title($this->__('outer/edge'))
            ->_title($this->__('Slideshow'))
            ->_setActiveMenu('edge');

        return $this;
    }

    public function indexAction()
    {
        $this->_initAction()
             ->renderLayout();
    }

    public function newAction()
    {
        $this->_forward('edit');
    }

    public function editAction()
    {
        $this->_title($this->__('Slideshow'))
             ->_title($this->__('Slides'))
             ->_title($this->__('Manage Content'));

        // 1. Get ID and create model
        $id = $this->getRequest()->getParam('slideshow_id');
        $model = Mage::getModel('slideshow/slideshow');

        // 2. Initial checking
        if ($id) {
            $model->load($id);
            if (! $model->getId()) {
                Mage::getSingleton('adminhtml/session')->addError(
                    Mage::helper('slideshow')->__('This slide no longer exists.'));
                $this->_redirect('*/*/');
                return;
            }
        }

        $this->_title($model->getId() ? $model->getTitle() : $this->__('New Slide'));

        // 3. Set entered data if was error when we do save
        $data = Mage::getSingleton('adminhtml/session')->getFormData(true);
        if (! empty($data)) {
            $model->setData($data);
        }

        // 4. Register model to use later in blocks
        Mage::register('slideshow', $model);

        // 5. Build edit form
        $this->_initAction()
             ->_addBreadcrumb(
                $id ? Mage::helper('slideshow')->__('Edit Slide')
                    : Mage::helper('slideshow')->__('New Slide'),
                $id ? Mage::helper('slideshow')->__('Edit Slide')
                    : Mage::helper('slideshow')->__('New Slide'));

        $this->renderLayout();
    }
}