<?php

declare(strict_types=1);

namespace GraphqlEx\ProductAttributes\Model\Resolver;

use Magento\Eav\Api\AttributeRepositoryInterface;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;

class AllProductAttributes implements ResolverInterface
{
    private AttributeRepositoryInterface $attributeRepository;

    public function __construct(
        AttributeRepositoryInterface $attributeRepository
    ) {
        $this->attributeRepository = $attributeRepository;
    }

    /**
     * @inheritdoc
     */
    public function resolve(
        Field $field,
        $context,
        ResolveInfo $info,
        array $value = null,
        array $args = null
    ) {
        $pageSize = $args['pageSize'] ?? 20;
        $currentPage = $args['currentPage'] ?? 1;
        $sort = $args['sort'] ?? [];

    }

}
