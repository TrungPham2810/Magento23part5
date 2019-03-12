<?php
namespace  Testpart5\One\Model\ResourceModel;
class Post extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected  function _construct() {
        $this->_init('table_one_part5','one_id');
    }
}