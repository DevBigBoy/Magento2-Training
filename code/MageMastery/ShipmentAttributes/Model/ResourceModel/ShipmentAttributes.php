<?php

namespace MageMastery\ShipmentAttributes\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class ShipmentAttributes extends AbstractDb
{
    protected function _construct()
    {
        $this->_init(
            'magemastery_shipment_attributes',
            'entity_id'
        );
    }
}
