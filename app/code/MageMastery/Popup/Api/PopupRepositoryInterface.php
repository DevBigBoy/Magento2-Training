<?php

namespace MageMastery\Popup\Api;

use MageMastery\Popup\Api\Data\PopupInterface;

interface PopupRepositoryInterface
{

    /**
     * @param \MageMastery\Popup\Api\Data\PopupInterface
     * @return int
     */
    public function save(PopupInterface $popup): int;

    /**
     * @param int $popupId
     * @return \MageMastery\Popup\Api\Data\PopupInterface
     * @throws Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById(int $popupId): PopupInterface;

    /**
     * @param \Learning\Popup\Api\Data\PopupInterface $popup
     * @return void
     */
    public function delete(PopupInterface $popup): void;

    /**
     * @param int $popupId
     * @return bool
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws  \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById(int $popupId): bool;
}
