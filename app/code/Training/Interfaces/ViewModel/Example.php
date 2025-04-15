<?php
declare(strict_types=1);

namespace Training\Interfaces\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Training\Interfaces\Api\SupplierRepositoryInterface;

class Example implements ArgumentInterface
{


    /** @var SupplierRepositoryInterface m */
    private SupplierRepositoryInterface $supplierRepository;

    /**
     * @param SupplierRepositoryInterface $supplierRepository
     */
    public function __construct(
        SupplierRepositoryInterface $supplierRepository
    ) {
        $this->supplierRepository = $supplierRepository;
    }


    public function getSupplierCode(): string
    {
        return $this->supplierRepository->createNew('FGH-345-RT')->getCode();
    }


}
