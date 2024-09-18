<?php
namespace Mgn\Notification\Model\ResourceModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
class NotificationResource extends AbstractDb{
    const TABLE_NAME = 'my_database_table';
    const TABLE_ID = 'product_id';
    protected function _construct(){
        $this->_init(self::TABLE_NAME, self::TABLE_ID);
    }
}
