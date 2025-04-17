<?php

namespace Training\ProxyExample\Model\FeaturedProducts;

class FeaturedBySales implements FeaturedProductsInterface
{
    protected array $featuredProducts = [];

    public function __construct()
    {
        $this->loadFeaturedProducts();
    }

    public function getFeaturedProducts(): array
    {
        return $this->featuredProducts;
    }

    public function count(): int
    {
        return count($this->featuredProducts);
    }

    protected function loadFeaturedProducts(): void
    {
        $this->featuredProducts = [
            'sales 1',
            'sales 2',
            'sales 3',
            'sales 4',
            'sales 5',
            'sales 6',
        ];
    }
}
