<?php
namespace Testpart5\One\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade( SchemaSetupInterface $setup, ModuleContextInterface $context ) {
        $installer = $setup;

        $installer->startSetup();

        if(version_compare($context->getVersion(), '1.3.0', '<')) {
            $installer->getConnection()->addColumn(
                $installer->getTable( 'table_one_part5' ),
                'test',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
                    'nullable' => true,
                    'length' => '12,4',
                    'comment' => 'test',
                    'after' => 'status_one'
                ]
            );
        }

        $table = $installer->getConnection()
            ->newTable($installer->getTable('comment_table'))
            ->addColumn(
                'id',
                \Magento\Framework\Db\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'nullable' => false, 'primary' => true, 'unsigned' => true],
                'Example Id'
            )->addColumn(
                'title',
                \Magento\Framework\Db\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false],
                'Example Title'
            )->addColumn(
                'content',
                \Magento\Framework\Db\Ddl\Table::TYPE_TEXT,
                '2M',
                [],
                'Example Content'
            )->addColumn(
                'created_at',
                \Magento\Framework\Db\Ddl\Table::TYPE_TIMESTAMP,
                null,
                ['nullable' => false, 'default' => \Magento\Framework\Db\Ddl\Table::TIMESTAMP_INIT],
                'Created At'
            );
        $installer->getConnection()->createTable($table);
        $installer->endSetup();
    }
}