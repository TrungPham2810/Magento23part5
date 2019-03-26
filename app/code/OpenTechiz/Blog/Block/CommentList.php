<?php
namespace OpenTechiz\Blog\Block;
use Magento\Framework\View\Element\Template;
use OpenTechiz\Blog\Api\Data\CommentInterface;
Use OpenTechiz\Blog\Model\ResourceModel\Comment\Collection as CommentCollection;

class CommentList extends \Magento\Framework\View\Element\Template
{
    protected  $_commentFactory;
    protected  $_commentCollectionFactory;
    protected $_registry;
    protected $_customerRepository;
    protected $_customerSession;

    public function __construct(
        Template\Context $context,
        array $data = [],
        \OpenTechiz\Blog\Model\CommentFactory $commentFactory,
        \OpenTechiz\Blog\Model\ResourceModel\Comment\CollectionFactory $commentCollectionFactory,
        \Magento\Customer\Model\Session $customerSession,
        \Magento\Customer\Api\CustomerRepositoryInterfaceFactory $customerRepositoryFactory,
        \Magento\Framework\Registry $registry
    )
    {
        parent::__construct($context, $data);
        $this->_commentFactory = $commentFactory;
        $this->_customerSession = $customerSession;
        $this->_customerRepository = $customerRepositoryFactory;
        $this->_commentCollectionFactory = $commentCollectionFactory;
        $this->_registry = $registry;
    }

    public function getNameUser($id) {
       $userInfo = $this->_customerRepository->create()->getById($id);
       return $userInfo->getFirstName()." ".$userInfo->getLastName();
    }

    public function getCustomerId() {
        return $this->_customerSession->getCustomer()->getId();
    }
    public function getComments()
    {

        $comment = $this->_commentFactory->create();
        $collection = $comment->getCollection();
        $post_id = $this->_registry->registry('post_id');
        $commentlist = [];
        foreach ($collection as $comments) {
            if ($comments->getBlogId() == $post_id ) {
                array_push($commentlist, $comments);
            }
    }
        return $commentlist;
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
        return 'opentechizblog/comment/save';
    }

}