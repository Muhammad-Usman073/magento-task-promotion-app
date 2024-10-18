<?php

namespace Macademy\Menerva\Ui\Component\Listing\Column;

use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;

/**
 * Class Actions
 */
class Actions extends Column
{
    /** @var UrlInterface */
    protected $urlBuilder;

    public function __construct(
        ContextInterface   $context,
        UiComponentFactory $uiComponentFactory,
        UrlInterface $urlBuilder,
        array              $components = [],
        array              $data = []
    ){
        $this->urlBuilder = $urlBuilder;
parent::__construct($context, $uiComponentFactory, $components, $data);
    }
    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */

    public function prepareDataSource(array $dataSource)
    {
        if (!isset($dataSource['data']['items'])) {
            return $dataSource;
        }
            foreach ($dataSource['data']['items'] as & $item) {
                // here we can also use the data from $item to configure some parameters of an action URL
                if(!isset($item['id'])){
                    continue;
                }
                $item[$this->getData('name')] = [
                    'edit' => [
                        'href' => $this->urlBuilder->getUrl('menerva/faq/edit', ['id' => $item['id']]),
                        'label' => __('Edit')
                    ],
                    'remove' => [
                        'href' => $this->urlBuilder->getUrl('menerva/faq/delete', ['id' => $item['id']]),
                        'label' => __('Delete')
                    ],
                    'duplicate' => [
                        'href' => '/duplicate',
                        'label' => __('Duplicate')
                    ],
                ];
            }

        return $dataSource;
    }
}

