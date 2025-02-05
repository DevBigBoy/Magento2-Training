<?php
/**
 * Copyright © MageMastery. All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace MageMastery\Popup\Model;

use MageMastery\Popup\Api\Data\PopupInterface;
use Magento\Framework\Model\AbstractModel;
use MageMastery\Popup\Model\ResourceModel\Popup as PopupResourceModel;

/**
 * Class Popup
 *
 * @package MageMastery\Popup\Model
 */
class Popup extends AbstractModel implements PopupInterface
{
    protected function _construct()
    {
        $this->_eventPrefix = 'magemastery_popup';
        $this->_eventObject = 'popup';
        $this->_idFieldName =  PopupResourceModel::FIELD_NAME;
        $this->_init(PopupResourceModel::class);
    }

    /**
     * Get Popup ID
     *
     * @return int|null
     */
    public function getPopupId(): ?int
    {
        return $this->_getData(self::POPUP_ID);
    }

    /**
     * Set Popup ID
     *
     * @param int $popupId
     * @return $this
     */
    public function setPopupId(int $popupId): self
    {
        return $this->setData(self::POPUP_ID, $popupId);
    }

    /**
     * Get Popup Name
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->_getData(self::NAME);
    }

    /**
     * Set Popup Name
     *
     * @param string $name
     * @return $this
     */
    public function setName(string $name): self
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * Get Popup Content
     *
     * @return string|null
     */
    public function getContent(): ?string
    {
        return $this->_getData(self::CONTENT);
    }

    /**
     * Set Popup Content
     *
     * @param string $content
     * @return $this
     */
    public function setContent(string $content): self
    {
        return $this->setData(self::CONTENT, $content);
    }

    /**
     * Get Popup Creation Time
     *
     * @return string|null
     */
    public function getCreatedAt(): ?string
    {
        return $this->_getData(self::CREATED_AT);
    }

    /**
     * Set Popup Creation Time
     *
     * @param string $createdAt
     * @return $this
     */
    public function setCreatedAt(string $createdAt): self
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }

    /**
     * Get Popup Modification Time
     *
     * @return string|null
     */
    public function getUpdatedAt(): ?string
    {
        return $this->_getData(self::UPDATED_AT);
    }

    /**
     * Set Popup Modification Time
     *
     * @param string $updatedAt
     * @return $this
     */
    public function setUpdatedAt(string $updatedAt): self
    {
        return $this->setData(self::UPDATED_AT, $updatedAt);
    }

    /**
     * Get Popup Active Status
     *
     * @return bool
     */
    public function getIsActive(): bool
    {
        return (bool) $this->_getData(self::IS_ACTIVE);
    }

    /**
     * Set Popup Active Status
     *
     * @param bool $isActive
     * @return $this
     */
    public function setIsActive(bool $isActive): self
    {
        return $this->setData(self::IS_ACTIVE, $isActive);
    }

    /**
     * Get Popup Timeout
     *
     * @return int|null
     */
    public function getTimeout(): ?int
    {
        return $this->_getData(self::TIMEOUT);
    }

    /**
     * Set Popup Timeout
     *
     * @param int $timeout
     * @return PopupInterface
     */
    public function setTimeout(int $timeout): PopupInterface
    {
        return $this->setData(self::TIMEOUT, $timeout);
    }
}
