<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Bigboy\UpdateCustomer\Model\Resolver;

use Magento\CustomerGraphQl\Model\Customer\ExtractCustomerData;
use Magento\CustomerGraphQl\Model\Customer\GetCustomer;
use Bigboy\UpdateCustomer\Model\Customer\UpdateCustomerAccount;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlAuthorizationException;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Query\Resolver\Value;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Magento\GraphQl\Model\Query\ContextInterface;

/**
 * Customer email update, used for GraphQL request processing
 */
class UpdateCustomerEmail implements ResolverInterface
{
    /**
     * @var GetCustomer
     */
    private $getCustomer;

    /**
     * @var UpdateCustomerAccount
     */
    private $updateCustomerAccount;

    /**
     * @var ExtractCustomerData
     */
    private $extractCustomerData;

    /**
     * @param GetCustomer $getCustomer
     * @param UpdateCustomerAccount $updateCustomerAccount
     * @param ExtractCustomerData $extractCustomerData
     */
    public function __construct(
        GetCustomer $getCustomer,
        UpdateCustomerAccount $updateCustomerAccount,
        ExtractCustomerData $extractCustomerData
    ) {
        $this->getCustomer = $getCustomer;
        $this->updateCustomerAccount = $updateCustomerAccount;
        $this->extractCustomerData = $extractCustomerData;
    }

    /**
     * Resolve customer email update mutation
     *
     * @param \Magento\Framework\GraphQl\Config\Element\Field $field
     * @param \Magento\Framework\GraphQl\Query\Resolver\ContextInterface $context
     * @param ResolveInfo $info
     * @param array|null $value
     * @param array|null $args
     * @return array|Value
     * @throws \Exception
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function resolve(
        Field $field,
              $context,
        ResolveInfo $info,
        array $value = null,
        array $args = null
    ) {
        /** @var ContextInterface $context */
        if (false === $context->getExtensionAttributes()->getIsCustomer()) {
            throw new GraphQlAuthorizationException(__('The current customer isn\'t authorized.'));
        }

        if (!isset($args['input']['password']) || '' == trim($args['input']['password'])) {
            throw new GraphQlInputException(__('Specify the "newPassword" value.'));
        }

        $customer = $this->getCustomer->execute($context);

        $this->updateCustomerAccount->execute(
            $customer,
            [
                'email' => $args['input']['email'] ?? null,
                'password' => $args['input']['password'],
                'otp' => $args['input']['otp'] ?? null
            ],
            $context->getExtensionAttributes()->getStore()
        );

        $data = $this->extractCustomerData->execute($customer);

        return ['customer' => $data];
    }
}
