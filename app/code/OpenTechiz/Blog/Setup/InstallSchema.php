<?php
//namespace OpenTechiz\Blog\Setup;
//
//use Magento\Framework\Setup\InstallSchemaInterface;
//use Magento\Framework\Setup\ModuleContextInterface;
//use Magento\Framework\Setup\SchemaSetupInterface;
//// use Magento\Framework\DB\Ddl\Table;
//
//class InstallSchema implements InstallSchemaInterface
//{
//    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
//    {
//        $installer = $setup;
//        $installer->startSetup();
//        $table = $installer->getConnection()
//            ->newTable($installer->getTable('opentechiz_blog_post')
//            )
//            ->addColumn(
//                'post_id',
//                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
//                null,
//                ['identity'=> true, 'nullable' => false, 'primary'=> true],
//                'Post ID'
//            )
//            ->addColumn(
//                'url_key',
//                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
//                255,
//                ['nullable'=> true, 'default'=> null]
//                )
//            ->addColumn(
//                'title',
//                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
//                255,
//                ['nullable'=> false ],
//                'Blog Title'
//                )
//            ->addColumn(
//                'content',
//                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
//                '2M',
//                [],
//                'Blog Content'
//                )
//            ->addColumn(
//                'is_active',
//                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
//                null,
//                ['nullable'=>false, 'default'=>'1'],
//                'Is Post Active'
//                )
//            ->addColumn(
//                'creation_time',
//                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
//                null,
//                ['nullable'=>false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
//                'Creation Time'
//                )
//            ->addColumn(
//                'update_time',
//                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
//                null,
//                ['nullable'=>false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE],
//                'Update Time'
//                )
////            ->addIndex($installer->getIdxName('blog_post',['url_key']), ['url_key'])
//            ->setComment('Blog Posts');
//        $installer->getConnection()->createTable($table);
//
////        $table = $installer->getConnection()
////            ->newTable($installer->getTable('comment_blog'))
////            ->addColumn(
////                'comment_id',
////                \Magento\Framework\Db\Ddl\Table::TYPE_INTEGER,
////                null,
////                ['identity' => true, 'nullable' => false, 'primary' => true, 'unsigned' => true],
////                'Comment Id'
////            )->addColumn(
////                'comment',
////                \Magento\Framework\Db\Ddl\Table::TYPE_TEXT,
////                '2M',
////                ['nullable' => false],
////                'Comment'
////            )->addColumn(
////                'blog_id',
////                \Magento\Framework\Db\Ddl\Table::TYPE_INTEGER,
////                11,
////                [],
////                'Blog Id'
////            )->addColumn(
////                'customer_id',
////                \Magento\Framework\Db\Ddl\Table::TYPE_INTEGER,
////                11,
////                [],
////                'Customer'
////            )->addColumn(
////                'status_id',
////                \Magento\Framework\Db\Ddl\Table::TYPE_INTEGER,
////                1,
////                [],
////                'Status Id'
////            )->addColumn(
////                'created_at',
////                \Magento\Framework\Db\Ddl\Table::TYPE_TIMESTAMP,
////                null,
////                ['nullable' => false, 'default' => \Magento\Framework\Db\Ddl\Table::TIMESTAMP_INIT],
////                'Created At'
////            )->addForeignKey(
////                $installer->getFkName(
////                    'comment_blog',
////                    'blog_id',
////                    'opentechiz_blog_post',
////                    'post_id'
////                ),
//////                'comment_blog',
////                'blog_id',
////                $installer->getTable('opentechiz_blog_post'),
////                'post_id',
////                \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
////            )->addForeignKey(
////                $installer->getFkName(
////                    'comment_blog',
////                    'customer_id',
////                    'customer_entity',
////                    'entity_id'),
//////                'comment_blog',
////                'customer_id',
////                $installer->getTable('customer_entity'),
////                'entity_id',
////                \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
////            );
////        $installer->getConnection()->createTable($table);
//        $installer->endSetup();
//
//    }
//}