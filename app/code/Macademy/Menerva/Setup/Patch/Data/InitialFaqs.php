<?php
declare(strict_types=1);
namespace Macademy\Menerva\Setup\Patch\Data;

use Magento\Framework\App\ResourceConnection;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class InitialFaqs implements dataPatchInterface{
    protected $moduleDataSetup;
    protected $resource;
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        ResourceConnection $resource
    ){
$this->moduleDataSetup = $moduleDataSetup;
$this->resource = $resource;
    }

    public static function getDependencies()
    {
       return [];
    }

    public function getAliases()
    {
        return [];
    }

    public function apply(): self
    {
        $connection = $this->resource->getConnection();
        $data = [
           [ 'question'=>'what is ur name?',
        'answer'=>"my name is john",
    'is_published'=>1
        ],
            [ 'question'=>'where are u from?',
        'answer'=>"i m from united states of america",
    'is_published'=>1
        ],
            [
                'question'=>'what u do?',
        'answer'=>"i am student",
    'is_published'=>1
        ],
            ];
        $connection->insertMultiple('macademy_menerva_faq', $data);
        return $this;
    }
}
