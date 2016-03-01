<?php

namespace Edge\Slideshow\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * Install schema
 * @category Edge
 * @package  Edge_Slideshow
 * @module   Slideshow
 * @author   Outeredge
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * {@inheritdoc}
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();

        /*
         * Drop tables if exists
         */
        $installer->getConnection()->dropTable($installer->getTable('slideshow'));

        /*
         * Create table slideshow
         */
        $table = $installer->getConnection()->newTable(
            $installer->getTable('slideshow')
        )->addColumn(
            'id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            10,
            ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
            'Slider ID'
        )->addColumn(
            'title',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => true, 'default' => ''],
            'Slider title'
        )->addColumn(
            'description',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => true, 'default' => ''],
            'Description'
        )->addColumn(
            'link',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            null,
            ['nullable' => true, 'default' => ''],
            'Link'
        )->addColumn(
            'image',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            null,
            ['nullable' => true, 'default' => ''],
            'Image'
        )->addColumn(
            'sort_order',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            11,
            ['nullable' => false, 'default' => '0'],
            'Sort order'
        )->addIndex(
            $installer->getIdxName('slideshow', ['id']),
            ['id']
        );
        $installer->getConnection()->createTable($table);
        /*
         * End create table slideshow
         */

        $installer->endSetup();
    }
}
