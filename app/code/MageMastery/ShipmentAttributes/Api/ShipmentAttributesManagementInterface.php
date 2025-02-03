<?php

namespace MageMastery\ShipmentAttributes\Api;

use MageMastery\ShipmentAttributes\Api\Data\ShipmentAttributesInterface;

interface ShipmentAttributesManagementInterface
{
    /**
     * Get shipment attributes by shipment ID.
     *
     * @param int $shipmentId
     * @return ShipmentAttributesInterface
     */
    public function getByShipmentId(int $shipmentId): ShipmentAttributesInterface;
}
