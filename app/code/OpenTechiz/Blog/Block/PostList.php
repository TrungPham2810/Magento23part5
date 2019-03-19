<?php
namespace OpenTechiz\Blog\Block;
use Magento\Framework\View\Element\Template;
use OpenTeachiz\Blog\Api\Data\PostInterface;
Use OpenTechiz\Blog\Model\ResourceModel\Post\Collection as PostCollection;

class PostList extends \Magento\Framework\View\Element\Template
{
    protected  $_postFactory;

    public function __construct(
        Template\Context $context,
        array $data = [],
        \Opentechiz\Blog\Model\PostFactory $postFactory)
    {
        parent::__construct($context, $data);
        $this->_postFactory = $postFactory;
    }

    public function getPosts()
    {
        if(!$this->hasData('posts')) {
            $posts = $this->_postFactory
                ->create()
                ->addFilter('is_active',1)
                ->addOrder(
                    PostInterface::CREATION_TIME,
                    PostInterface::SORT_ORDER_DESC
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