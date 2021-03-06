<?php
namespace OpenTechiz\Blog\Block;
class PostView extends \Magento\Framework\View\Element\Template
{
    protected $_commentCollectionFactory;
    protected $_registry;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \OpenTechiz\Blog\Model\Post $post,
        \OpenTechiz\Blog\Model\PostFactory $postFactory,
        \OpenTechiz\Blog\Model\ResourceModel\Comment\CollectionFactory $commentCollectionFactory,
        \Magento\Framework\Registry $registry,
        array $data = []
    )
    {
        $this->_registry = $registry;
        $this->_post = $post;
        $this->_commentCollectionFactory = $commentCollectionFactory;
        parent::__construct($context, $data);
        $this->_postFactory = $postFactory;
    }

//    public function _prepareLayout()
//    {
//        //set page title
//        $post = $this->getPost();
//
//        $this->pageConfig->getTitle()->set(__($post->getTitle()));
//
//        return parent::_prepareLayout();
//    }

    public function getPost()
    {
//        if (!$this->hasData('posts')) {
//            if ($this->getPostId()) {
//                $post = $this->_postFactory->create();
//            } else {
//                $post = $this->_post;
//            }
//            $this->setData('posts', $post);
//        }
        $post_id = $this->_registry->registry('post_id');

//        return $this->getData('posts');
        return $this->_postFactory->create()->load($post_id);

    }

    public function getIdentities()
    {
        $identities = $this->getPost()->getIdentities();
        $comments = $this->_commentCollectionFactory
            ->create()
            ->addFieldToFilter('comment_id', $this->getID())
            ->addFieldToFilter('status_id', '1');
        foreach ($comments as $comment) {
            $identities = array_merge($identities,
                [\OpenTechiz\Blog\Model\Comment::CACHE_COMMENT_POST_TAG."_".$comment->getID()]);
        }
        return ($identities);
//        return 'ok';
    }
}