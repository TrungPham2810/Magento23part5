<?php
namespace OpenTechiz\Blog\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;

    protected $_postFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \OpenTechiz\Blog\Model\PostFactory $postCollectionFactory
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->_postFactory = $postCollectionFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
//        $post = $this->_postFactory->create();
//        $collection = $post->getCollection();
//        foreach($collection as $item){
//            echo "<pre>";
////            $a = $item->getData();
////            echo $a['post_id'];
//            print_r($item->getData());
//            echo "</pre>";
//        }
//        exit();
        return $this->_pageFactory->create();
    }
}