<?php

namespace MageMastery\ShipmentAttributes\Model;

use Magento\Framework\Model\AbstractModel;
use MageMastery\ShipmentAttributes\Api\Data\ShipmentAttributesInterface;
use MageMastery\ShipmentAttributes\Model\ResourceModel\ShipmentAttributes as ResourceModel;

class ShipmentAttributes extends AbstractModel implements ShipmentAttributesInterface
{
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }

    public function getEntityId(): ?int
    {
        return $this->getData(self::ENTITY_ID);
    }

    public function setEntityId($entityId): ShipmentAttributesInterface
    {
        return $this->setData(self::ENTITY_ID, $entityId);
    }

    public function getShipmentId(): int
    {
        return (int) $this->getData(self::SHIPMENT_ID);
    }

    public function setShipmentId(int $shipmentId): ShipmentAttributesInterface
    {
        return $this->setData(self::SHIPMENT_ID, $shipmentId);
    }

    public function getCarrier(): string
    {
        return (string) $this->getData(self::CARRIER);
    }

    public function setCarrier(string $carrier): ShipmentAttributesInterface
    {
        return $this->setData(self::CARRIER, $carrier);
    }

    public function getCost(): ?float
    {
        return $this->getData(self::COST) !== null ? (float) $this->getData(self::COST) : null;
    }

    public function setCost(?float $cost): ShipmentAttributesInterface
    {
        return $this->setData(self::COST, $cost);
    }

    public function getDeliveryDate(): ?string
    {
        return $this->getData(self::DELIVERY_DATE);
    }

    public function setDeliveryDate(?string $deliveryDate): ShipmentAttributesInterface
    {
        return $this->setData(self::DELIVERY_DATE, $deliveryDate);
    }
}
