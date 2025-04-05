<?php

namespace MageMastery\ShipmentAttributes\Api\Data;

interface ShipmentAttributesInterface
{
    const ENTITY_ID = 'entity_id';
    const SHIPMENT_ID = 'shipment_id';
    const CARRIER = 'carrier';
    const COST = 'cost';
    const DELIVERY_DATE = 'delivery_date';

    public function getEntityId(): ?int;
    public function setEntityId(int $entityId): self;

    public function getShipmentId(): int;
    public function setShipmentId(int $shipmentId): self;

    public function getCarrier(): string;
    public function setCarrier(string $carrier): self;

    public function getCost(): ?float;
    public function setCost(?float $cost): self;

    public function getDeliveryDate(): ?string;
    public function setDeliveryDate(?string $deliveryDate): self;
}
