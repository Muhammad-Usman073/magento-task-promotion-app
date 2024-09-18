<?php
declare(strict_types = 1);

namespace Mgn\Notification\Model;
use http\Exception;
use Mgn\Notification\Api\Data\NotificationInterface;
use Mgn\Notification\Api\NotificationRepositoryInterface ;
use Mgn\Notification\Model\ResourceModel\NotificationResource;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Mgn\Notification\Model\NotificationFactory;

class NotificationRepository implements NotificationRepositoryInterface
{
    public function __construct(
        private NotificationFactory $notificationFactory,
        private NotificationResource $notificationResource,
    ){}

    public function getById(int $id): NotificationInterface
    {
        $post = $this->notificationFactory->create();
        $this->notificationResource->load($post, $id);
        if(!$post->getID()){
            throw new noSuchEntityException(__('the blog post with "%1" doesn\t exist.',));
        }
        return $post;
    }

    public function save(NotificationInterface $post): NotificationInterface
    {
        try{
            $this->postResourceModel->save($post);

        }catch(\Exception $exception){
            throw new CouldNotSaveException(__($exception->getMessage()));
        }
        return $post;
    }

    public function deleteById(int $id): bool
    {
        $post =  $this->getById($id);
        try {
            $this->postResourceModel->delete($post);
        }catch (\Exception $exception){
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }
        return true;
    }
}
