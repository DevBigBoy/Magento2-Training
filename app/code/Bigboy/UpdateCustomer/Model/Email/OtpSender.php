<?php

declare(strict_types=1);

namespace Bigboy\UpdateCustomer\Model\Email;

use Magento\Framework\Mail\Template\TransportBuilder;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\Translate\Inline\StateInterface;
use Magento\Framework\Exception\MailException;
use Magento\Framework\Escaper;

class OtpSender
{
    public const TEMPLATE_ID = 'bigboy_update_customer_otp_email';

    public function __construct(
        private TransportBuilder $transportBuilder,
        private StoreManagerInterface $storeManager,
        private StateInterface $inlineTranslation,
        private Escaper $escaper
    ) {}

    /**
     * Send the OTP email
     *
     * @param string $customerName
     * @param string $email
     * @param string $otp
     * @throws MailException
     */
    public function send(string $customerName, string $email, string $otp): void
    {
        $store = $this->storeManager->getStore();

        $this->inlineTranslation->suspend();

        try {
            $transport = $this->transportBuilder
                ->setTemplateIdentifier(self::TEMPLATE_ID)
                ->setTemplateOptions([
                    'area'  => \Magento\Framework\App\Area::AREA_FRONTEND,
                    'store' => $store->getId(),
                ])
                ->setTemplateVars([
                    'customer_name' => $this->escaper->escapeHtml($customerName),
                    'otp' => $otp,
                    'store' => $store
                ])
                ->setFrom([
                    'name' => $store->getFrontendName(),
                    'email' => 'no-reply@' . parse_url($store->getBaseUrl(), PHP_URL_HOST),
                ])
                ->addTo($email)
                ->getTransport();

            $transport->sendMessage();
        } finally {
            $this->inlineTranslation->resume();
        }
    }
}
