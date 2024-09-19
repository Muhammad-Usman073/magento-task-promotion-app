<?php

declare(strict_types=1);
namespace Macademy\Menerva\Controller\Adminhtml\Faq;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\PageFactory;

class Index implements HttpGetActionInterface
{
    protected function __construct(
        private PageFactory $pageFactory,
    ){}
    public function execute() : HttpGetActionInterface
    {
        return $this->pageFactory->create();
    }
}
