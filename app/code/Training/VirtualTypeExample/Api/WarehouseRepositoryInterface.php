<?php

namespace Training\VirtualTypeExample\Api;

use Magento\Framework\DataObject;

interface WarehouseRepositoryInterface
{

    public function newWarehouse(string $code): DataObject;
}
