<?php

declare(strict_types=1);

namespace GraphqlEx\ProductAttributes\Model;


use GraphqlEx\ProductAttributes\Api\Data\AttributeSwatchOptionInterface;
use Magento\Eav\Model\Entity\Attribute\Option;

class AttributeSwatchOption extends Option implements AttributeSwatchOptionInterface
{
    /**
     * Resource initialization
     *
     * @return void
     */
    public function _construct()
    {
        parent::__construct();
    }

    public function getType()
    {
        return $this->getData(AttributeSwatchOptionInterface::TYPE);
    }

    public function getSwatchValue()
    {
        return $this->getData(AttributeSwatchOptionInterface::SWATCHVALUE);
    }

    public function setType($type)
    {
        return $this->setData(AttributeSwatchOptionInterface::TYPE, $type);
    }

    public function setSwatchValue($value)
    {
        return $this->setData(AttributeSwatchOptionInterface::SWATCHVALUE, $value);
    }
}
