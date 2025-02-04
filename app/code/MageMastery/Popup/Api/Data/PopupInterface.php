<?php
/**
 * Copyright © MageMastery. All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace MageMastery\Popup\Api\Data;

/**
 * Interface PopupInterface
 *
 * @package MageMastery\Popup\Api\Data
 */
interface PopupInterface
{
    /**#@+
     * Constants for column names
     */
    const POPUP_ID = 'popup_id';
    const NAME = 'name';
    const CONTENT = 'content';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const IS_ACTIVE = 'is_active';
    const TIMEOUT = 'timeout';
    /**#@-*/

    /**
     * Get Popup ID
     *
     * @return int|null
     */
    public function getPopupId(): ?int;

    /**
     * Set Popup ID
     *
     * @param int $popupId
     * @return $this
     */
    public function setPopupId(int $popupId): self;

    /**
     * Get Popup Name
     *
     * @return string|null
     */
    public function getName(): ?string;

    /**
     * Set Popup Name
     *
     * @param string $name
     * @return $this
     */
    public function setName(string $name): self;

    /**
     * Get Popup Content
     *
     * @return string|null
     */
    public function getContent(): ?string;

    /**
     * Set Popup Content
     *
     * @param string $content
     * @return $this
     */
    public function setContent(string $content): self;

    /**
     * Get Popup Creation Time
     *
     * @return string|null
     */
    public function getCreatedAt(): ?string;

    /**
     * Set Popup Creation Time
     *
     * @param string $createdAt
     * @return $this
     */
    public function setCreatedAt(string $createdAt): self;

    /**
     * Get Popup Modification Time
     *
     * @return string|null
     */
    public function getUpdatedAt(): ?string;

    /**
     * Set Popup Modification Time
     *
     * @param string $updatedAt
     * @return $this
     */
    public function setUpdatedAt(string $updatedAt): self;

    /**
     * Get Popup Active Status
     *
     * @return bool
     */
    public function getIsActive(): bool;

    /**
     * Set Popup Active Status
     *
     * @param bool $isActive
     * @return $this
     */
    public function setIsActive(bool $isActive): self;

    /**
     * Get Popup Timeout
     *
     * @return int|null
     */
    public function getTimeout(): ?int;

    /**
     * Set Popup Timeout
     *
     * @param int $timeout
     * @return $this
     */
    public function setTimeout(int $timeout): self;
}
