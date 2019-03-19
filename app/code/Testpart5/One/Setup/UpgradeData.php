<?php

namespace Testpart5\One\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class UpgradeData implements UpgradeDataInterface
{
    protected $_postFactory;

//    public function __construct(\Mageplaza\HelloWorld\Model\PostFactory $postFactory)
//    {
//        $this->_postFactory = $postFactory;
//    }

    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        if (version_compare($context->getVersion(), '1.3.0', '<')) {
            $installer = $setup;
            $installer->startSetup();
            $data = [
                'name_one'         => "Magento 2 Events",
                'post_content_one' => "This article will talk about Events List in Magento 2. As you know, Magento 2 is using the events driven architecture which will help too much to extend the Magento functionality. We can understand this event as a kind of flag that rises when a specific situation happens. We will use an example module Mageplaza_HelloWorld to exercise this lesson.",
                'url_key_one'      => '/magento-2-module-development/magento-2-events.html',
                'tags_one'         => 'magento 2,mageplaza helloworld',
                'status_one'       => 1
            ];
//            $post = $this->_postFactory->create();
//            $post->addData($data)->save();
            $setup->getConnection()->insert($setup->getTable('table_one_part5'), $data);
            $installer->endSetup();
        }


    }
}
