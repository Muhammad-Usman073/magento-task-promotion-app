<?php
namespace Macademy\Menerva\Model;
use Magento\Framework\Model\AbstractModel;
Class Faq extends AbstractModel{
    protected function _construct(){
      $this->_init(\Macademy\Menerva\Model\ResourceModel\Faq::class);
    }
}
