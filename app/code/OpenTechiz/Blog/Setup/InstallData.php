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
            'title'           => "Test model openteachiz",
            'content'         => 'Each field in system.xml after create will not have any value. When you call them, you will receive ‘null’ result. 
                                    So for the module, we will need to set the default value for the field and you will call the value without go to config, set value and save it. 
                                    This default value will be saved in config.xml which is located in etc folder. Let’s create it for this simple configuration:',
            'is_active'       => 1
        ];
//        $post = $this->_postFactory->create();
//        $post->addData($data)->save();
        $setup->getConnection()->insert($setup->getTable('opentechiz_blog_post'), $data);
        $installer->endSetup();
    }
}