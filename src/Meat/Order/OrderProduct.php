<?php

namespace Meat\Order;

use Meat\Product\Product;

class OrderProduct
{
    /**
     * @var Product
     */
    protected $product;

    /**
     * @var int
     */
    protected $quantity = 0;

    /**
     * @return float
     */
    public function total()
    {
        return (float) ($this->product->getPrice() * $this->quantity);
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

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }
}
