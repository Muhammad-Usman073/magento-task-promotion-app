<?php declare(strict_types=1);

namespace Macademy\Menerva\Controller\Adminhtml\Faq;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\Controller\Result\JsonFactory;

class InlineEdit extends Action implements HttpPostActionInterface
{

    const ADMIN_RESOURCE = "Macademy_Menerva::faq_save";
    /**
     * @var JsonFactory
     * */
    protected $jsonFactory;

    public function __construct(Context $context, JsonFactory $jsonFactory)
    {
        parent::__construct($context);
    }

    public function execute()
    {
        $json = $this->jsonFactory->create();
        $messages = [];
        $error = false;
        $isAjax = $this->getRequest()->getParam('isAjax', false);
        $items = $this->getRequest()->getParam('items', [ ]);

        if(!$isAjax||!count($items)) {
            $messages[] = "please correct the data that u sent";
            $errors = true;
    }

        return $json->setJsonData(
            ['messages'=> $messages,
        'errors'=> $error,
        ]);
    }
}
