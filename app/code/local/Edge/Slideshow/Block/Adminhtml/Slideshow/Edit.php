<?php

class Edge_Slideshow_Block_Adminhtml_Slideshow_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    /**
     * Initialize slideshow edit block
     * @return void
     */
    public function __construct()
    {
        $this->_objectId   = 'slideshow_id';
        $this->_controller = 'adminhtml_slideshow';
        $this->_blockGroup = 'slideshow';

        parent::__construct();

        $this->_updateButton('save', 'label', Mage::helper('slideshow')->__('Save Slide'));
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save and Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_updateButton('delete', 'label', Mage::helper('slideshow')->__('Delete Slide'));

        $this->_formScripts[] = "
            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    /**
     * Retrieve text for header element depending on loaded page
     * @return string
     */
    public function getHeaderText()
    {
        if (Mage::registry('slideshow')->getId()) {
            return Mage::helper('slideshow')->__("Edit Slide '%s'", $this->escapeHtml(Mage::registry('slideshow')->getTitle()));
        }
        else {
            return Mage::helper('slideshow')->__('New Slide');
        }
    }

    /**
     * Get form action URL
     * @return string
     */
    public function getFormActionUrl()
    {
        if ($this->hasFormActionUrl()) {
            return $this->getData('form_action_url');
        }
        return $this->getUrl('*/' . $this->_blockGroup . '/save');
    }
}
