<?php

namespace MageMastery\ShipmentAttributes\Service;

use MageMastery\ShipmentAttributes\Api\ShipmentAttributesManagementInterface;
use MageMastery\ShipmentAttributes\Api\Data\ShipmentAttributesInterface;
use MageMastery\ShipmentAttributes\Model\ResourceModel\ShipmentAttributes as ShipmentAttributesResource;
use MageMastery\ShipmentAttributes\Model\ShipmentAttributesFactory as ShipmentAttributesFactory;

class ShipmentAttributesManagement implements ShipmentAttributesManagementInterface
{

    /** @var ShipmentAttributesFactory  */
    private ShipmentAttributesFactory $shipmentAttributesFactory;

    /** @var ShipmentAttributesResource  */
    private ShipmentAttributesResource $shipmentAttributesResource;

    /**
     * @param ShipmentAttributesResource $shipmentAttributesResource
     * @param ShipmentAttributesFactory $shipmentAttributesFactory
     */
    public function __construct(
        ShipmentAttributesResource $shipmentAttributesResource,
        ShipmentAttributesFactory $shipmentAttributesFactory
    )
    {
        $this->shipmentAttributesFactory = $shipmentAttributesFactory;
        $this->shipmentAttributesResource = $shipmentAttributesResource;
    }

    /**
     * @param int $shipmentId
     * @return ShipmentAttributesInterface
     */
    public function getByShipmentId(int $shipmentId): ShipmentAttributesInterface
    {
        $object = $this->getNewInstance();
        $this->shipmentAttributesResource->load($object, $shipmentId, 'shipment_id');
        return $object;
    }


    /**
     * @return ShipmentAttributesInterface
     */
    public function getNewInstance(): ShipmentAttributesInterface
    {
        return $this->shipmentAttributesFactory->create();
    }
}
