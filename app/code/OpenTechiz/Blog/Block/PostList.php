<?php
namespace OpenTechiz\Blog\Block;
use Magento\Framework\View\Element\Template;
use OpenTechiz\Blog\Api\Data\PostInterface;
Use OpenTechiz\Blog\Model\ResourceModel\Post\Collection as PostCollection;

class PostList extends \Magento\Framework\View\Element\Template
{
    protected  $_postFactory;
    protected  $_postCollectionFactory;

    public function __construct(
        Template\Context $context,
        array $data = [],
        \OpenTechiz\Blog\Model\PostFactory $postFactory,
        \OpenTechiz\Blog\Model\ResourceModel\Post\CollectionFactory $postCollectionFactory
    )
    {
        parent::__construct($context, $data);
        $this->_postFactory = $postFactory;
        $this->_postCollectionFactory = $postCollectionFactory;
    }

    public function getPosts()
    {
        if(!$this->hasData('posts')) {
            $posts = $this->_postCollectionFactory
                ->create()
                ->addFilter('is_active',1)
                ->addOrder(
                    PostInterface::CREATION_TIME
//                    PostInterface::SORT_ORDER_DESC
                );
            $this->setData('posts',$posts);
        }
        return $this->getData('posts');
    }

    public function getInfo()
    {
        $post = $this->_postFactory->create();
        $collection = $post->getCollection();
        return $collection;
//        foreach($collection as $item){
//            echo "<pre>";
////            $a = $item->getData();
////            echo $a['post_id'];
//            print_r($item->getData());
//            echo "</pre>";
//        }
    }

}