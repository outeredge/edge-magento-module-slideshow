<?php

class Edge_Slideshow_Block_Adminhtml_Slideshow_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    /**
     * Load Wysiwyg on demand and Prepare layout
     */
    protected function _prepareLayout()
    {
        parent::_prepareLayout();
        if (Mage::getSingleton('cms/wysiwyg_config')->isEnabled()) {
            $this->getLayout()->getBlock('head')->setCanLoadTinyMce(true);
        }
    }

    protected function _prepareForm()
    {
        /** @var $model Edge_Slideshow_Model_Slideshow */
        $model = Mage::registry('slideshow');

        $form = new Varien_Data_Form(array(
            'id'      => 'edit_form',
            'action'  => $this->getData('action'),
            'method'  => 'post',
            'enctype' => 'multipart/form-data'
        ));
        $form->setUseContainer(true);
        $form->setHtmlIdPrefix('slideshow_');

        $fieldset = $form->addFieldset('content_fieldset', array(
            'legend' => Mage::helper('cms')->__('Content'),
            'class'  => 'fieldset-wide'
        ));

        $wysiwygConfig = Mage::getSingleton('cms/wysiwyg_config')->getConfig();

        if ($model->getId()) {
            $fieldset->addField('id', 'hidden', array('name' => 'id'));
        }

        $fieldset->addField('title', 'text', array(
            'label' => Mage::helper('slideshow')->__('Title'),
            'name'  => 'title'
        ));

        $fieldset->addField('description', 'editor', array(
            'label'  => Mage::helper('slideshow')->__('Description'),
            'name'   => 'description',
            'config' => $wysiwygConfig
        ));

        $fieldset->addField('link', 'text', array(
            'label' => Mage::helper('slideshow')->__('Link'),
            'name'  => 'link'
        ));

        $fieldset->addField('image', 'image', array(
            'label' => Mage::helper('slideshow')->__('Image'),
            'name'  => 'image'
        ));

        $fieldset->addField('from_date', 'date', array(
            'name' => 'from_date',
            'label' => Mage::helper('slideshow')->__('Active From'),
            'image'  => Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_SKIN).'/adminhtml/default/default/images/grid-cal.gif',
            'input_format' => Varien_Date::DATE_INTERNAL_FORMAT,
            'format' => Mage::app()->getLocale()->getDateFormat(Mage_Core_Model_Locale::FORMAT_TYPE_MEDIUM),
        ));

        $fieldset->addField('to_date', 'date', array(
            'name' => 'to_date',
            'label' => Mage::helper('slideshow')->__('Active To'),
            'image'  => Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_SKIN).'/adminhtml/default/default/images/grid-cal.gif',
            'input_format' => Varien_Date::DATE_INTERNAL_FORMAT,
            'format' => Mage::app()->getLocale()->getDateFormat(Mage_Core_Model_Locale::FORMAT_TYPE_MEDIUM),
        ));

        $fieldset->addField('sort_order', 'text', array(
            'label' => Mage::helper('slideshow')->__('Sort Order'),
            'name'  => 'sort_order'
        ));

        $form->setValues($model->getData());
        $this->setForm($form);

        return parent::_prepareForm();
    }
}