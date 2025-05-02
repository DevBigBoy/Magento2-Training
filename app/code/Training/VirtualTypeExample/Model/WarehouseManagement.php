<?php

namespace Training\VirtualTypeExample\Model;

use Training\VirtualTypeExample\Api\WarehouseManagementInterface;

class WarehouseManagement implements WarehouseManagementInterface
{

    public function getWarehouseInfo(string $warehouseCode): array
    {
        $warehouses = $this->getAllWarehouses();
        if (array_key_exists($warehouseCode, $warehouses)) {
            return $warehouses[$warehouseCode];
        }
        return  [];
    }

    protected function getAllWarehouses(): array
    {
        return [
            'lon1' => [
                'name' => 'London',
                'code' => 'lon1',
                'postcode' => 'ASV34H'
            ],
            'nyc1' => [
                'name' => 'New York',
                'code' => 'nyc1',
                'postcode' => 'NY10001'
            ],
            'syd1' => [
                'name' => 'Sydney',
                'code' => 'syd1',
                'postcode' => 'NSW2000'
            ],
            'par1' => [
                'name' => 'Paris',
                'code' => 'par1',
                'postcode' => '75001'
            ],
            'tok1' => [
                'name' => 'Tokyo',
                'code' => 'tok1',
                'postcode' => '100-0001'
            ]
        ];
    }
}
