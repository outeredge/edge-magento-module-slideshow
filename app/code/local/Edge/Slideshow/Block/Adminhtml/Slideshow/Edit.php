<?php

class Edge_Slideshow_Block_Adminhtml_Slideshow_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();

        $this->_objectId = 'id';
        $this->_blockGroup = 'slideshow';
        $this->_controller = 'adminhtml_slideshow';

        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('slideshow')->__('Save and Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    protected function _prepareLayout()
    {
        if (Mage::getSingleton('cms/wysiwyg_config')->isEnabled()) {
            $this->getLayout()->getBlock('head')->setCanLoadTinyMce(true);
            $this->getLayout()->getBlock('head')->setCanLoadExtJs(true);
        }
        parent::_prepareLayout();
    }

    public function getHeaderText()
    {
        return Mage::helper('slideshow')->__('Edit Slide');
    }
}
