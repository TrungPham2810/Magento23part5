<?php
namespace Testpart5\One\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
//    protected $_postFactory;
//
//    public function __construct(Testpart5\One\Model\PostFactory $postFactory)
//    {
//        $this->_postFactory = $postFactory;
//    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        $data = [
            'name_one'         => "How to Create SQL Setup Script in Magento 2",
            'post_content_one' => " to change the database structure or add some new data for current table. To do this, Magento 2 provide you some classes which you can do all of them.",
            'url_key_one'      => '/magento-2-module-development/magento-2-how-to-create-sql-setup-script.html',
            'tags_one'         => 'magento 2,mageplaza helloworld',
            'status_one'       => 1
        ];
//        $post = $this->_postFactory->create();
//        $post->addData($data)->save();
        $setup->getConnection()->insert($setup->getTable('table_one_part5'), $data);
        $data2 = [
            'title'         => "Magento 2 Events",
            'content'       => "oWorld to exercise this lesson."

        ];
        $setup->getConnection()->insert($setup->getTable('data_example'), $data2);
        $installer->endSetup();
    }
}