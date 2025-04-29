<?php
declare(strict_types=1);

namespace Bigboy\UpdateCustomer\Model\Customer;

use Magento\Customer\Api\Data\CustomerInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\GraphQl\Exception\GraphQlAlreadyExistsException;
use Magento\Framework\GraphQl\Exception\GraphQlAuthenticationException;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Exception\GraphQlNoSuchEntityException;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Store\Api\Data\StoreInterface;
use Magento\CustomerGraphQl\Model\Customer\ValidateCustomerData;
use Magento\CustomerGraphQl\Model\Customer\SaveCustomer;
use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Customer\Model\CustomerRegistry;
use Magento\Framework\Encryption\EncryptorInterface;
use Psr\Log\LoggerInterface;

class UpdateCustomerAccount
{
    private SaveCustomer $saveCustomer;
    private DataObjectHelper $dataObjectHelper;
    private ValidateCustomerData $validateCustomerData;
    private CustomerRegistry $customerRegistry;
    private CustomerRepositoryInterface $customerRepository;
    private EncryptorInterface $encryptor;
    private array $restrictedKeys;
    private LoggerInterface $logger;

    public function __construct(
        SaveCustomer $saveCustomer,
        DataObjectHelper $dataObjectHelper,
        ValidateCustomerData $validateCustomerData,
        CustomerRegistry $customerRegistry,
        CustomerRepositoryInterface $customerRepository,
        EncryptorInterface $encryptor,
        LoggerInterface $logger,
        array $restrictedKeys = []
    ) {
        $this->saveCustomer = $saveCustomer;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->validateCustomerData = $validateCustomerData;
        $this->customerRegistry = $customerRegistry;
        $this->customerRepository = $customerRepository;
        $this->encryptor = $encryptor;
        $this->restrictedKeys = $restrictedKeys;
        $this->logger = $logger;
    }

    /**
     * Update customer account information atomically
     *
     * @param CustomerInterface $customer
     * @param array $data
     * @param StoreInterface $store
     * @throws LocalizedException
     */
    public function execute(CustomerInterface $customer, array $data, StoreInterface $store): void
    {
        $newEmail = $data['email'] ?? null;
        $newPassword = $data['password'] ?? null;

        try {
            if (empty($newEmail) || empty($newPassword)) {
                throw new GraphQlInputException(__('Both email and password are required.'));
            }

            if (strtolower($newEmail) !== strtolower($customer->getEmail())) {
                $customer->setEmail($newEmail);
            }

            $this->validateCustomerData->execute($data);

            $filteredData = array_diff_key($data, array_flip($this->restrictedKeys));
            $this->dataObjectHelper->populateWithArray($customer, $filteredData, CustomerInterface::class);

            try {
                $customer->setStoreId($store->getId());
            } catch (NoSuchEntityException $exception) {
                throw new GraphQlNoSuchEntityException(__($exception->getMessage()), $exception);
            }

            // Only save if password update is successful
            $this->updatePassword((int) $customer->getId(), $newPassword);
            $this->saveCustomer->execute($customer);

        } catch (\Exception $e) {
            // Optional: log the full exception for debugging
            $this->logger->error('Customer update failed: ' . $e->getMessage());
            throw new LocalizedException(__('Unable to update account. Please try again later.'));
        }
    }

    /**
     * Securely update the customer's password
     *
     * @param int $customerId
     * @param string $password
     * @throws LocalizedException
     */
    private function updatePassword(int $customerId, string $password): void
    {
        $hashedPassword = $this->encryptor->getHash($password, true);

        $customer = $this->customerRepository->getById($customerId);
        $customerSecure = $this->customerRegistry->retrieveSecureData($customerId);
        $customerSecure->setPasswordHash($hashedPassword);

        $this->customerRepository->save($customer);
    }
}
