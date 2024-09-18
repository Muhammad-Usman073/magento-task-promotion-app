<?php
namespace Mgn\Notification\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface
{
    /**
     * Installs DB schema for a module
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();

        $table = $installer->getConnection()
            ->newTable($installer->getTable('my_database_table'))
            ->addColumn(
                'product_id',
                Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'ID'
            )
            ->addColumn(
                'promotion_name',
                Table::TYPE_TEXT,
                null,
                ['nullable' => false, 'default' => ''],
                'promotion name'
            )
            ->addColumn(
                'description',
                Table::TYPE_TEXT,
                null,
                ['nullable' => false, 'default' => ''],
                'description of promotion'
            )
            ->addColumn(
                'start_date',
                Table::TYPE_DATE,
                null,
                [],
                'start date of promotion'
            )
            ->addColumn(
                'end_date',
                Table::TYPE_DATE,
                null, [],
                'end date of promotion'
            )
            ->setComment('this is the table that contains promotions');
        $installer->getConnection()->createTable($table);

        $installer->endSetup();
    }
}
