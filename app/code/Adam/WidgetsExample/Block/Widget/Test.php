<?php

namespace Adam\WidgetsExample\Block\Widget;

use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;

class Test extends Template implements BlockInterface
{
    protected $_template = "widget/test.phtml";

    /**
     * Get the widget title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->getData('title'); // Fetches the 'title' parameter value
    }

    /**
     * Get the widget description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->getData('description'); // Fetches the 'description' parameter value
    }

    /**
     * Get the widget size.
     *
     * @return string
     */
    public function getSize()
    {
        return $this->getData('size'); // Fetches the 'size' parameter value
    }
}
