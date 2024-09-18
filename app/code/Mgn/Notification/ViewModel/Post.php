<?php
namespace Mgn\Notification\ViewModel;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use Mgn\Notification\Model\NotificationRepository;

class Post implements ArgumentInterface{

    public function __construct(
        private RequestInterface $request,
        private NotificationRepository $notificationRepository,
    ){}

    public function getDetail(){
$id= (int) $this->request->getParam('id');
return $this->notificationRepository->getById($id);
    }
}
