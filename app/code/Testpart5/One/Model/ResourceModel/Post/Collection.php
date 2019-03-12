<?php
namespace Testpart5\One\Model\ResourceModel\Post;
class  Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'one_id';
    protected function _construct()
    {
        $this->_init('Testpart5\One\Model\Post',
            'Testpart5\One\Model\ResourceModel\Post'
            );
    }
}