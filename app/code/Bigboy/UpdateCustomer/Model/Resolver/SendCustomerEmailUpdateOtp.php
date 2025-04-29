<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Bigboy\UpdateCustomer\Model\Resolver;

use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Customer\Model\ResourceModel\Customer\CollectionFactory as CustomerCollectionFactory;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlAuthorizationException;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Magento\GraphQl\Model\Query\ContextInterface;
use Magento\Framework\Stdlib\DateTime\DateTime;
use Magento\Customer\Model\Session as CustomerSession;
use Bigboy\UpdateCustomer\Model\Email\OtpSender;
use Magento\Framework\Validator\EmailAddress;
use Psr\Log\LoggerInterface;


class SendCustomerEmailUpdateOtp implements ResolverInterface
{

    private CustomerRepositoryInterface $customerRepository;
    private CustomerCollectionFactory $customerCollectionFactory;
    private DateTime $dateTime;
    private CustomerSession $customerSession;
    private LoggerInterface $logger;
    private OtpSender $otpSender;
    private EmailAddress $emailAddress;

    /**
     * @param CustomerRepositoryInterface $customerRepository
     * @param CustomerCollectionFactory $customerCollectionFactory
     * @param DateTime $dateTime
     * @param CustomerSession $customerSession
     * @param OtpSender $otpSender
     * @param EmailAddress $emailAddress
     * @param LoggerInterface $logger
     */
    public function __construct(
        CustomerRepositoryInterface $customerRepository,
        CustomerCollectionFactory $customerCollectionFactory,
        DateTime $dateTime,
        CustomerSession $customerSession,
        OtpSender $otpSender,
        EmailAddress $emailAddress,
        LoggerInterface $logger
    ) {
        $this->customerRepository = $customerRepository;
        $this->customerCollectionFactory = $customerCollectionFactory;
        $this->dateTime = $dateTime;
        $this->customerSession = $customerSession;
        $this->logger = $logger;
        $this->otpSender = $otpSender;
        $this->emailAddress = $emailAddress;
    }



    public function resolve(
        Field       $field,
                    $context,
        ResolveInfo $info,
        array       $value = null,
        array       $args = null
    )
    {
        /** @var ContextInterface $context */
        if (false === $context->getExtensionAttributes()->getIsCustomer()) {
            throw new GraphQlAuthorizationException(__('The current customer isn\'t authorized.'));
        }
        if (!isset($args['input']['email']) || '' == trim($args['input']['email'])) {
            throw new GraphQlInputException(__('Specify the The Email value'));
        }


        try {
            if (!$this->emailAddress->isValid($args['input']['email'])) {
                throw new GraphQlInputException(__('Invalid email format'));
            }

            ## no accoicated


            ##



            $otp = random_int(100000, 999999);







            return [
                'status' => true,
                'message' => __('OTP has been sent to your email')
            ];
        }catch (\Exception $exception){
            throw new GraphQlInputException(__($exception->getMessage()), $exception);
        }
    }
}
