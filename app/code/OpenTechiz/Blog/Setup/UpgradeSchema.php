<?php
namespace OpenTechiz\Blog\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade( SchemaSetupInterface $setup, ModuleContextInterface $context ) {
//        $installer = $setup;
//
//        $installer->startSetup();
////
//        if (version_compare($context->getVersion(), '2.0.1') < 0) {
//            $installer = $setup;
//            $installer->startSetup();
//            $installer->getConnection();
//            $installer->getConnection()->getTable('comment_blog')
//                ->addForeignKey(
//                $installer->getFkName(
//                    'comment_blog',
//                    'blog_id',
//                    'opentechiz_blog_post',
//                    'post_id'
//                ),
////                'comment_blog'
//                'blog_id',
//                $installer->getTable('opentechiz_blog_post'),
//                'post_id',
//                \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
//            )->addForeignKey(
//                $installer->getFkName(
//                    'comment_blog',
//                    'customer_id',
//                    'customer_entity',
//                    'entity_id'),
////                'comment_blog',
//                'customer_id',
//                $installer->getTable('customer_entity'),
//                'entity_id',
//                \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
//            );
//            $installer->endSetup();
//        }
//        $installer->endSetup();
    }
}