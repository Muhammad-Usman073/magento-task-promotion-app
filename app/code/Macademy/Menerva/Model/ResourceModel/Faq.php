<?php
namespace Macademy\Menerva\Model\ResourceModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
class Faq extends AbstractDb{

    const MAIN_TABLE = 'macadamy_menerva_faq';
    const ID = 'id';

    protected function _construct(){
       return $this->_init(self::MAIN_TABLE, self::ID);
    }
}
