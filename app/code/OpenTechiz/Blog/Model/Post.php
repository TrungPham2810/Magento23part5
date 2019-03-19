<?php
namespace OpenTechiz\Blog\Model;
use OpenTechiz\Blog\Api\Data\PostInterface;
class Post extends \Magento\Framework\Model\AbstractModel implements  PostInterface
{
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;

    protected  $_eventPrefix = 'Blog_post';

    protected function _construct()
    {
        $this->_init('OpenTechiz\Blog\Model\ResourceModel\Post');
    }

    public function checkUrlKey($url_key)
    {
        return $this->_getResource()->checkUrlKey($url_key);
    }

    public function getAvailableStatuses()
    {
        return [self::STATUS_ENABLED=>_('Enabled'), self::STATUS_DISABLED=>_('Disable')];
    }


}