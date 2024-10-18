<?php

declare(strict_types=1);
namespace Macademy\Menerva\Controller\Adminhtml\Faq;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\Page;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\PageFactory;

class Edit extends Action implements HttpGetActionInterface
{
    const ADMIN_RESOURCE = 'Macademy_Menerva::faq_save';
    public function __construct(
        private PageFactory $pageFactory,
        private Context $context,
    ) {
        parent::__construct($context);
    }
    public function execute() : Page
    {
        $page = $this->pageFactory->create();
        $page->setActiveMenu('Macademy_Menerva::faq');
        $page->getConfig()->getTitle()->prepend('Edit FAQs');
        return $page;
    }
}
