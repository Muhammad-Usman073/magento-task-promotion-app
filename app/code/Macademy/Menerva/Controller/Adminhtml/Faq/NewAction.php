<?php

declare(strict_types=1);
namespace Macademy\Menerva\Controller\Adminhtml\Faq;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\Page;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\PageFactory;

class NewAction extends Action implements HttpGetActionInterface
{
    const ADMIN_RESOURCE = 'Macademy_Menerva::faq';
    public function __construct(
        private PageFactory $pageFactory,
        private Context $context
    ) {
        parent::__construct($context);
    }
    public function execute() : Page
    {
        $page = $this->pageFactory->create();
        $page->setActiveMenu('Macademy_Menerva::faq');
        $page->getConfig()->getTitle()->prepend('Add new FAQs');
        return $page;
    }
}
