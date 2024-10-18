<?php

declare(strict_types=1);

namespace Mgn\Notification\Ui\Config;

use Magento\Ui\DataProvider\AbstractDataProvider;
use Mgn\Notification\Model\ResourceModel\Notification\CollectionFactory;

/**
 * Class CustomDataProvider
 */
class CustomDataProvider extends AbstractDataProvider
{
    /**
     * CustomDataProvider constructor.
     *
     * @param $name
     * @param $primaryFieldName
     * @param $requestFieldName
     * @param CollectionFactory $collectionFactory
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $collectionFactory->create();

        parent::__construct(
            $name,
            $primaryFieldName,
            $requestFieldName,
            $meta,
            $data
        );
    }

    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        return [
        ];
    }
}
