<?php
namespace OpenTechiz\Blog\Model\ResourceModel;

class Post extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        // TODO: Implement _construct() method.
        $this->_init('opentechiz_blog_post', 'post_id');
    }
}