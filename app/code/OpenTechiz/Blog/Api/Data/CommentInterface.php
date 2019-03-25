<?php
namespace OpenTechiz\Blog\Api\Data;
interface CommentInterface
{
    const COMMENT_ID = 'comment_id';
    const COMMENT = 'comment';
    const BLOG_ID = 'blog_id';
    const STATUS_ID = 'status_id';
    const CUSTOMER_ID = 'customer_id';
    const CREATED_AT = 'created_at';

    public function getId();
    public function getList();
    public function getBlogId();
    public function getComment();
    public function getStatusId();
    public function getCustomerId();
    public function getCreationAt();

    public function setId($id);
    public function setBlogId($blogId);
    public function setCustomerId($customerId);
    public function setComment($comment);
    public function setStatusId($statusId);
    public function setCreationAt($creationTime);
}