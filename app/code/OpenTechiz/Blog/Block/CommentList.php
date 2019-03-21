<?php
namespace OpenTechiz\Blog\Block;
use Magento\Framework\View\Element\Template;
use OpenTechiz\Blog\Api\Data\CommentInterface;
Use OpenTechiz\Blog\Model\ResourceModel\Comment\Collection as CommentCollection;

class CommentList extends \Magento\Framework\View\Element\Template
{
    protected  $_commentFactory;
    protected  $_commentCollectionFactory;

    public function __construct(
        Template\Context $context,
        array $data = [],
        \OpenTechiz\Blog\Model\CommentFactory $commentFactory,
        \OpenTechiz\Blog\Model\ResourceModel\Comment\CollectionFactory $commentCollectionFactory
    )
    {
        parent::__construct($context, $data);
        $this->_commentFactory = $commentFactory;
        $this->_commentCollectionFactory = $commentCollectionFactory;
    }

    public function getComments()
    {

        $comment = $this->_commentFactory->create();
        $collection = $comment->getCollection();
        return $collection;
//        $comment = $this->_commentFactory->create();
//        $collection = $comment->getCollection();
//        return $collection;
//        if(!$this->hasData('posts')) {
//            $comment = $this->_commentCollectionFactory
//                ->create()
//                ->addFilter('is_active',1)
//                ->addOrder(
//                    CommentInterface::CREATION_AT
////                    CommentInterface::SORT_ORDER_DESC
//                );
//            $this->setData('posts',$comment);
//        }
//        return $this->getData('posts');
    }

    public function getFormAction($data)
    {
        $comment = $this->_commentFactory->create();
        $collection = $comment->getCollection();
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