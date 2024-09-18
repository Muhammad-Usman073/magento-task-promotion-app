<?php
namespace Mgn\Notification\Model\ResourceModel\Notification;
use  Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Mgn\Notification\Model\Notification as Model;
use Mgn\Notification\Model\ResourceModel\NotificationResource as ResourceModel;

class Collection extends AbstractCollection{
    protected function _construct(){
        $this->_init(Model::class, ResourceModel::class);
    }
}
