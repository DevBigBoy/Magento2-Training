<?php

namespace Training\VirtualTypeExample\Model;

use Magento\Framework\DataObject;
use Training\VirtualTypeExample\Api\WarehouseRepositoryInterface;

class WarehouseRepository implements WarehouseRepositoryInterface
{

    private WarehouseManagement $warehouseManagement;

    public function __construct(
        WarehouseManagement $warehouseManagement
    ) {
        $this->warehouseManagement = $warehouseManagement;
    }
    public function newWarehouse(string $code): DataObject
    {
        return new DataObject($this->warehouseManagement->getWarehouseInfo($code));
    }
}
