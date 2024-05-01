<?php
declare(strict_types=1);

namespace App\DesignPatterns\AdapterPattern;

class ProductList
{
    /**
     * @param Product[] $productList
     */
    public function __construct(private array $productList)
    {

    }

    public function add(Product $product): self
    {
        $this->productList[] = $product;

        return $this;
    }

    /**
     * @return Product[]
     */
    public function getProducts(): array
    {
        return $this->productList;
    }
}