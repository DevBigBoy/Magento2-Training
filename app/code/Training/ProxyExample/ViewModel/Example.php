<?php

namespace Training\ProxyExample\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Training\ProxyExample\Model\FeaturedProducts;

class Example implements ArgumentInterface
{
    private FeaturedProducts $products;

    public function __construct(
        FeaturedProducts $products
    ) {
        $this->products = $products;
    }

    public function getFeaturedProducts(): array
    {
        return  $this->products->getFeaturedProducts();
    }
}
