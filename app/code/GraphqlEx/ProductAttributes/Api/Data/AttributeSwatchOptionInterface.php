<?php

declare(strict_types=1);

namespace GraphqlEx\ProductAttributes\Api\Data;

use Magento\Eav\Api\Data\AttributeOptionInterface;

interface AttributeSwatchOptionInterface extends AttributeOptionInterface
{
    /**
     * Constants used as data array keys
     */
    const string TYPE = 'type';
    const string SWATCHVALUE = 'swatch_value';
    /**
     * Get option label
     *
     * @return string
     */
    public function getType();
    /**
     * Set option label
     *
     * @param string $label
     * @return $this
     */
    public function setType($type);
    /**
     * Get option value
     *
     * @return string
     */
    public function getSwatchValue();
    /**
     * Set option value
     *
     * @param string $value
     * @return string
     */
    public function setSwatchValue($swatch_value);
}
