<?php

declare(strict_types=1);

namespace Mgn\Notification\Controller\Adminhtml\Table;

use Magento\Backend\App\Action\Context;
use Mgn\Notification\Model\NotificationRepository;
use Mgn\Notification\Model\NotificationFactory;
use Magento\Backend\App\Action;

class SaveData extends Action
{
    public function __construct(
        Context $context,
        private NotificationRepository $notificationRepository,
        private NotificationFactory $notificationFactory
    ){
        parent::__construct($context);
    }

    public function execute()
    {
        $model = $this->notificationFactory->create();
        $formData = $this->getRequest()->getPostValue();

        if ($formData) {
            try {
                $promotion_name = $formData['promotion_name'];
                $description = $formData['description'];
                $start_date = $formData['start_date'];
                $end_date = $formData['end_date'];

                $model->setPromotionName($promotion_name)
                    ->setDescription($description)
                    ->setStartDate($start_date)
                    ->setEndDate($end_date);

                $this->notificationRepository->save($model);

                $this->messageManager->addSuccessMessage(__('Notification saved successfully.'));
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage(__('An error occurred while saving the notification.'));
            }
        } else {
            $this->messageManager->addErrorMessage(__('No data was submitted.'));
        }
        return $this->_redirect('*/*/index');
    }

}

