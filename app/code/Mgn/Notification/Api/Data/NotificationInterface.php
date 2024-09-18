<?php
namespace Mgn\Notification\Api\Data;

interface NotificationInterface {
    const ID = 'notification_id';
    const PROMOTION_NAME = 'promotion_name';
    const DESCRIPTION = 'description';
    const START_DATE = 'start_date';
    const END_DATE = 'end_date';

    /**
     * @return int
     */
public function getId();


    /**
     * @return int $id
     * @return $this
     */
public function setId($id);


    /**
     * @return string
     */
public function getPromotionName();


    /**
     * @return string @promotionName
     * @return $this
     *
     */

public function setPromotionName($promotionName);

    /**
     * @return string
     */
public function getDescription();
    /**
     * @return string @description
     * @return $this
     *
     */
public function setDescription($description);
    /**
     * @return string
     */
public function getStartDate();
    /**
     * @return string @startDate
     * @return $this
     *
     */
public function setStartDate($startDate);
   /**
     * @return string
     */
public function getEndDate();
    /**
     * @return string @endDate
     * @return $this
     *
     */
public function setEndDate($endDate);
}
