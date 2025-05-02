<?php

namespace Training\VirtualTypeExample\Model;

class WarehouseManagementExtend extends WarehouseManagement
{
    protected function getAllWarehouses(): array
    {
        $warehouses =   [
              'ber1' => [
                  'name' => 'Berlin',
                  'code' => 'ber1',
                  'postcode' => 'BE12345'
              ],
              'mad1' => [
                  'name' => 'Madrid',
                  'code' => 'mad1',
                  'postcode' => 'MD28001'
              ],
              'ams1' => [
                  'name' => 'Amsterdam',
                  'code' => 'ams1',
                  'postcode' => 'AM1001'
              ]
        ];
        return array_merge(parent::getAllWarehouses(), $warehouses);
    }
}
