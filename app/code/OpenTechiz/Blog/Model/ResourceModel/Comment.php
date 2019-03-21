<?php
namespace OpenTechiz\Blog\Model\ResourceModel;

class Comment extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        // TODO: Implement _construct() method.
        $this->_init('comment_blog', 'comment_id');
    }
}