<?php

namespace Meat\Store;

use Meat\Product\Product;

class StockProduct
{
    /**
     * @var int
     */
    protected $stock;

    /**
     * @var int
     */
    protected $originalStock;

    /**
     * @var Product
     */
    protected $product;

    public function isOutOfStock(): bool
    {
        // TODO:
        return false;
    }

    /**
     * @return int
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * @param int $stock
     */
    public function setStock(int $stock): void
    {
        $this->stock = $stock;
    }

    /**
     * @return int
     */
    public function getOriginalStock()
    {
        return $this->originalStock;
    }

    /**
     * @param int $originalStock
     */
    public function setOriginalStock(int $originalStock): void
    {
        $this->originalStock = $originalStock;
    }

    /**
     * @return Product
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param Product $product
     */
    public function setProduct(Product $product): void
    {
        $this->product = $product;
    }
}
