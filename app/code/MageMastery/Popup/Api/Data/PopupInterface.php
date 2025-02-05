<?php
/**
 * Copyright © MageMastery. All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace MageMastery\Popup\Api\Data;

use MageMastery\Popup\Model\Popup;

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
     * @return PopupInterface
     */
    public function setPopupId(int $popupId): PopupInterface;

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
     * @return PopupInterface
     */
    public function setName(string $name): PopupInterface;

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
     * @return PopupInterface
     */
    public function setContent(string $content): PopupInterface;

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
     * @return PopupInterface
     */
    public function setCreatedAt(string $createdAt): PopupInterface;

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
     * @return PopupInterface
     */
    public function setUpdatedAt(string $updatedAt): PopupInterface;

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
     * @return PopupInterface
     */
    public function setIsActive(bool $isActive): PopupInterface;

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
     * @return PopupInterface
     */
    public function setTimeout(int $timeout): PopupInterface;
}
