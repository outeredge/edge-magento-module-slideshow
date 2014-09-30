<?php

class Edge_Slideshow_Block_Adminhtml_Slideshow_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('slideshowGrid');
        $this->setDefaultSort('id');
        $this->setDefaultDir('ASC');
        $this->setSaveParametersInSession(true);
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('slideshow/slideshow')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn('id', array(
            'header'    => Mage::helper('slideshow')->__('ID'),
            'width'     => '50',
            'index'     => 'id'
        ));

        $this->addColumn('title', array(
            'header'    => Mage::helper('slideshow')->__('Title'),
            'index'     => 'title'
        ));

        $this->addColumn('description', array(
            'header'    => Mage::helper('slideshow')->__('Description'),
            'index'     => 'description'
        ));

        $this->addColumn('link', array(
            'header'    => Mage::helper('slideshow')->__('Link'),
            'index'     => 'link'
        ));

        $this->addColumn('sort_order', array(
            'header'    => Mage::helper('slideshow')->__('Sort Order'),
            'width'     => '50',
            'index'     => 'sort_order'
        ));

        return parent::_prepareColumns();
    }

    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }
}