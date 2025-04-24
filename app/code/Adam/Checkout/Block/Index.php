<?php

declare(strict_types=1);

namespace Adam\Checkout\Block;

use Magento\Framework\View\Element\Template;

class Index extends Template
{
    /**
     * Example of how to get data or process logic for the template
     */

    protected $_checkoutSession;

    /**
     * Content constructor.
     * @param Template\Context $context
     * @param \Magento\Checkout\Model\Session $checkoutSession
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        \Magento\Checkout\Model\Session $checkoutSession,
        array $data = []
    ) {
        $this->_checkoutSession = $checkoutSession;
        parent::__construct($context, $data);
    }

    /**
     * Example function to get the current quote (cart)
     * @return \Magento\Quote\Model\Quote
     */
    public function getQuote()
    {
        return $this->_checkoutSession->getQuote();
    }

    /**
     * Example function to get customer data (just as an example, not a real-world method)
     * @return \Magento\Customer\Model\Session
     */
    public function getCustomerData()
    {
        $customerSession = \Magento\Framework\App\ObjectManager::getInstance()->get(\Magento\Customer\Model\Session::class);
        return $customerSession->getCustomer();
    }

    /**
     * Additional data functions can be added here to pass data to the template
     */
}
