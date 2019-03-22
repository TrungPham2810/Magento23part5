<?php
namespace OpenTechiz\Blog\Model;
use OpenTechiz\Blog\Api\Data\CommentInterface;
class Comment extends \Magento\Framework\Model\AbstractModel implements  CommentInterface
{
   const STATUS_ENABLED = 1;
    const STATUS_DISABLED =0;
    const STATUS_PENDING = 2;

    protected  $_eventPrefix = 'blog_post';

    protected function _construct()
    {
        $this->_init('OpenTechiz\Blog\Model\ResourceModel\Comment');
    }
    public function getAvailableStatuses()
    {
        return [self::STATUS_ENABLED=>_('Enabled'), self::STATUS_DISABLED=>_('Disable'),self::STATUS_PENDING=>_('Pending')];
    }
    public function getId()
    {
        return $this->getData(self::COMMENT_ID);
    }
    public function getList()
    {
        return $this->getData();
    }
    public function getBlogId(){
        return $this->getData(self::BLOG_ID);
    }
    public function getCustomerId()
    {
        return $this->getData(self::CUSTOMER_ID);
    }
    public function getComment()
    {
        return $this->getData(self::COMMENT);
    }
    public function getCreationAt()
    {
        return $this->getData(self::CREATED_AT);
    }
    public function getStatusId()
    {
        return $this->getData(self::STATUS_ID);
    }
    public function setId($id)
    {
        return $this->setData(self::ID, $id);
    }
    public function setBlogId($blogId)
    {
        return $this->setData(self::BLOG, $blogId);
    }
//    public function getUrl()
    public function setCustomerId($customerId)
    {
        return $this->setData(self::CUSTOMER_ID, $customerId);
    }
    public function setStatusId($statusId)
    {
        return $this->setData(self::STATUS_ID, $statusId);
    }
    public function setComment($comment)
    {
        return $this->setData(self::CONTENT, $comment);
    }
    public function setCreationAt($creationTime)
    {
        return $this->setData(self::CREATED_AT, $creationTime);
    }


}