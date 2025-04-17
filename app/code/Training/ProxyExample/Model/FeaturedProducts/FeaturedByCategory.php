<?php

namespace Training\ProxyExample\Model\FeaturedProducts;

class FeaturedByCategory implements FeaturedProductsInterface
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
            'product 1',
            'product 2',
            'product 3',
            'product 4',
            'product 5',
            'product 6',
        ];
    }
}
