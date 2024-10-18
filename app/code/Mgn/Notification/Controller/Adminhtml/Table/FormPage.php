<?php

declare(strict_types=1);
namespace Mgn\Notification\Controller\Adminhtml\Table;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\Page;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\PageFactory;

class FormPage extends Action implements HttpGetActionInterface
{
    public function __construct(
        private PageFactory $pageFactory,
        private Context $context
    ) {
        parent::__construct($context);
    }
    public function execute() : Page
    {
        $page = $this->pageFactory->create();
        $page->getConfig()->getTitle()->prepend(__('Create a New Promotion'));
        return $page;
    }
}
