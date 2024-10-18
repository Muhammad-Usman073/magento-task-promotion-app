<?php
declare(strict_types = 1);

namespace Mgn\Notification\Model;
use http\Exception;
use Magento\Framework\Exception\NoSuchEntityException;
use Mgn\Notification\Api\Data\NotificationInterface;
use Mgn\Notification\Api\NotificationRepositoryInterface ;
use Mgn\Notification\Model\ResourceModel\NotificationResource;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Mgn\Notification\Model\NotificationFactory;
use Mgn\Notification\Model\ResourceModel\Notification\CollectionFactory;

class NotificationRepository implements NotificationRepositoryInterface
{
    public function __construct(
        private NotificationFactory $notificationFactory,
        private NotificationResource $notificationResource,
        private CollectionFactory $collectionFactory,
    ){}

    public function getById(int $id): NotificationInterface
    {
        $post = $this->notificationFactory->create();
        $this->notificationResource->load($post, $id);
        if(!$post->getID()){
            throw new NoSuchEntityException(__('the blog post with "%1" doesn\t exist.',));
        }
        return $post;
    }
    public function getAllData(): array
    {
        $postCollection = $this->collectionFactory->create();
        $postCollection->addFieldToFilter('is_published',['eq'=>'1']) ;
        $arrayData = $postCollection->getItems();
        return $arrayData;
    }

    public function save(NotificationInterface $post): NotificationInterface
    {
        try{
$this->notificationResource->save($post);
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
