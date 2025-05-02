<?php

declare(strict_types=1);

namespace Training\VirtualTypeExample\Api;

interface WarehouseManagementInterface
{
    public function getWarehouseInfo(string $warehouseCode): array;
}
