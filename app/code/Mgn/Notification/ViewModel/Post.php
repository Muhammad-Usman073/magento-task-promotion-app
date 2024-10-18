<?php
namespace Mgn\Notification\ViewModel;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use Mgn\Notification\Model\NotificationRepository;

class Post implements ArgumentInterface{

    public function __construct(
        private NotificationRepository $notificationRepository,
    ){}

    public function getDetail(){
        return $this->notificationRepository->getAllData();
    }
}
