<?php

namespace MageMastery\ShipmentAttributes\Model\ResourceModel\ShipmentAttributes;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use MageMastery\ShipmentAttributes\Model\ShipmentAttributes as Model;
use MageMastery\ShipmentAttributes\Model\ResourceModel\ShipmentAttributes as ResourceModel;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            Model::class,
            ResourceModel::class
        );
    }
}
