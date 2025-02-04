<?php
/**
 * Copyright © MageMastery. All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace MageMastery\Popup\Model\ResourceModel\Popup;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use MageMastery\Popup\Model\Popup as PopupModel;
use MageMastery\Popup\Model\ResourceModel\Popup as PopupResourceModel;

/**
 * Class Collection
 *
 * @package MageMastery\Popup\Model\ResourceModel\Popup\Collection
 */
class Collection extends AbstractCollection
{
    /**
     * Define model and resource model
     */
    protected $_idFieldName = PopupResourceModel::FIELD_NAME;
    protected $_model = PopupModel::class;
    protected $_resourceModel = PopupResourceModel::class;

    /**
     * Initialize collection
     */
    protected function _construct()
    {
        $this->_init(
            PopupModel::class,
            PopupResourceModel::class
        );
    }
}
