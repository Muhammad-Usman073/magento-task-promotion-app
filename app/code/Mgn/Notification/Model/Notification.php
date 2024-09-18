<?php
namespace Mgn\Notification\Model;
use Magento\Framework\Model\AbstractModel;
use \Mgn\Notification\Model\ResourceModel\NotificationResource;
use Mgn\Notification\Api\Data\NotificationInterface;


class Notification extends AbstractModel implements NotificationInterface {
protected function _construct(){
    $this->_init(NotificationResource::class);
}

    public function getPromotionName()
    {
        return $this->getData(self::PROMOTION_NAME,);
    }

    public function setPromotionName($promotionName)
    {
        return $this->setData(self::PROMOTION_NAME, $promotionName);
    }

    public function getDescription()
    {
        return $this->getData(self::DESCRIPTION);
    }

    public function setDescription($description)
    {
return $this->setData(self::DESCRIPTION, $description);
    }

    public function getStartDate()
    {
       return $this->getData(self::START_DATE);
    }

    public function setStartDate($startDate)
    {
            return $this->setData(self::START_DATE, $startDate);
    }

    public function getEndDate()
    {
        return $this->getData(self::END_DATE);
    }

    public function setEndDate($endDate)
    {
       return $this->setData(self::END_DATE, $endDate);
    }
}
