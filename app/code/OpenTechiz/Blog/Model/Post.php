<?php
namespace OpenTechiz\Blog\Model;
use OpenTechiz\Blog\Api\Data\PostInterface;
class Post extends \Magento\Framework\Model\AbstractModel implements  PostInterface
{
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;

    protected  $_eventPrefix = 'blog_post';

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

    public function getId()
    {
        return $this->getData(self::POST_ID);
    }
    public function getList()
    {
        return $this->getData();
    }
    public function getUrlKey(){
        return $this->getData(self::URL_KEY);
    }
    public function getTitle()
    {
        return $this->getData(self::TITLE);
    }
    public function getContent()
    {
        return $this->getData(self::CONTENT);
    }
    public function getCreationTime()
    {
        return $this->getData(self::CREATION_TIME);
    }
    public function getUpdateTime()
    {
        return $this->getData(self::UPDATE_TIME);
    }
    public function isActive()
    {
        return $this->getData(self::IS_ACTICE);
    }
    public function setId($id)
    {
        return $this->setData(self::POST_ID, $id);
    }
    public function setUrlKey($url_key)
    {
        return $this->setData(self::URL_KEY, $url_key);
    }
//    public function getUrl()
    public function setTitle($title)
    {
        return $this->setData(self::TITLE, $title);
    }
    public function setContent($content)
    {
        return $this->setData(self::CONTENT, $content);
    }
    public function setCreationTime($creationTime)
    {
        return $this->setData(self::CREATION_TIME, $creationTime);
    }
    public function setUpdateTime($updateTime)
    {
        return $this->setData(self::UPDATE_TIME, $updateTime);
    }
    public function setIsActive($isActive)
    {
        return $this->setData(self::IS_ACTICE, $isActive);
    }

}