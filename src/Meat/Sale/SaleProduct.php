<?php

namespace Meat\Sale;

use Meat\Store\Store;
use Meat\Product\Product;

class SaleProduct
{
    /**
     * @var Product
     */
    protected $product;

    /**
     * @var Store
     */
    protected $store;

    /**
     * @var int
     */
    protected $quantity = 0;

    /**
     * @var Sale
     */
    protected $sale;

    public function total()
    {
        return (float) ($this->quantity * $this->product->getPrice());
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
     * @return Store
     */
    public function getStore()
    {
        return $this->store;
    }

    /**
     * @param Store $store
     */
    public function setStore(Store $store): void
    {
        $this->store = $store;
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

    /**
     * @return Sale
     */
    public function getSale()
    {
        return $this->sale;
    }

    /**
     * @param Sale $sale
     */
    public function setSale(Sale $sale): void
    {
        $this->sale = $sale;
    }
}
