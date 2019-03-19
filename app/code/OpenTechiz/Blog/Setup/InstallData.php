<?php
namespace OpenTechiz\Blog\Setup;

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
            'url_key'         => "https://www.youtube.com/",
            'title' => "Test model openteachiz",
            'content'      => '/magento-2-module-development/magento-2-how-to-create-sql-setup-script.html',
            'is_active'         => 1
        ];
//        $post = $this->_postFactory->create();
//        $post->addData($data)->save();
        $setup->getConnection()->insert($setup->getTable('opentechiz_blog_post'), $data);
        $installer->endSetup();
    }
}