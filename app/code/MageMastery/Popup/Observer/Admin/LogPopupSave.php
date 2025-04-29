<?php
namespace MageMastery\Popup\Observer\Admin;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;
use Psr\Log\LoggerInterface;

class LogPopupSave implements ObserverInterface
{
    protected $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function execute(Observer $observer)
    {
        $popup = $observer->getEvent()->getPopup();
        $this->logger->info('Popup saved in admin: ' . $popup->getName());
    }
}
