<?php

namespace Training\ProxyExample\Model;

use Training\ProxyExample\Model\FeaturedProducts\FeaturedByCategory;
use Training\ProxyExample\Model\FeaturedProducts\FeaturedBySales;

class FeaturedProducts
{
    private FeaturedByCategory $byCategory;
    private FeaturedBySales $bySales;

    public function __construct(
        FeaturedByCategory $byCategory,
        FeaturedBySales $bySales,
    ) {
        $this->byCategory = $byCategory;
        $this->bySales = $bySales;
    }

    public function getFeaturedProducts(): array
    {
        if ($this->byCategory->count() < 6) {
            return $this->bySales->getFeaturedProducts();
        }

        return $this->byCategory->getFeaturedProducts();
    }

}
