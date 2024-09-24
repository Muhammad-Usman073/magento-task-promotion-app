<?php
namespace Macademy\Menerva\Model\ResourceModel\Faq;

use Macademy\Menerva\Model\Faq;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection{
    protected function _construct(){
       $this->_init(Faq::class, \Macademy\Menerva\Model\ResourceModel\Faq::class);
    }
}
