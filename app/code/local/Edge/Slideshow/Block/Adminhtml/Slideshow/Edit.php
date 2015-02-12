<?php

class Edge_Slideshow_Block_Adminhtml_Slideshow_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    /**
     * Initialize cms page edit block
     *
     * @return void
     */
    public function __construct()
    {
        $this->_objectId   = 'slideshow_id';
        $this->_controller = 'adminhtml_slideshow';
        $this->_blockGroup = 'slideshow';

        parent::__construct();

        $this->_updateButton('save', 'label', Mage::helper('cms')->__('Save Slide'));
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save and Continue Edit'),
            'onclick'   => 'saveAndContinueEdit(\''.$this->_getSaveAndContinueUrl().'\')',
            'class'     => 'save',
        ), -100);

        $this->_updateButton('delete', 'label', Mage::helper('cms')->__('Delete Slide'));
    }

    /**
     * Retrieve text for header element depending on loaded page
     *
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
     * Getter of url for "Save and Continue" button
     * tab_id will be replaced by desired by JS later
     *
     * @return string
     */
    protected function _getSaveAndContinueUrl()
    {
        return $this->getUrl('*/*/save', array(
            '_current'   => true,
            'back'       => 'edit',
            'active_tab' => '{{tab_id}}'
        ));
    }
}
