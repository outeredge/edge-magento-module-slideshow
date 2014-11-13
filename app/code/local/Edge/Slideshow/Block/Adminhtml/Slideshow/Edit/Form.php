<?php

class Edge_Slideshow_Block_Adminhtml_Slideshow_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        $model = Mage::registry('slideshow');

        $form = new Varien_Data_Form(array(
            'id'        => 'edit_form',
            'action'    => $this->getUrl('*/*/save', array('id' => $this->getRequest()->getParam('id'))),
            'method'    => 'post',
            'enctype'	=> 'multipart/form-data'
        ));

        $fieldset = $form->addFieldset('base_fieldset', array(
            'legend'=>Mage::helper('slideshow')->__('General Information'),
            'class' => 'fieldset-wide'
        ));

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
            'config' => Mage::getSingleton('cms/wysiwyg_config')->getConfig()
        ));

        $fieldset->addField('link', 'text', array(
            'label' => Mage::helper('slideshow')->__('Link'),
            'name'  => 'link'
        ));

        $fieldset->addField('image', 'image', array(
            'label' => Mage::helper('slideshow')->__('Image'),
            'name'  => 'image'
        ));

        $fieldset->addField('sort_order', 'text', array(
            'label' => Mage::helper('slideshow')->__('Sort Order'),
            'name'  => 'sort_order'
        ));

        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);
        return parent::_prepareForm();
    }
}