<?php

namespace Meat\Store;

class Warehouse
{
    /**
     * @var StockProduct[]
     */
    protected $products = [];

    public function add(StockProduct $product)
    {
        if (in_array($product, $this->products)) {
            return;
        }

        $this->products[] = $product;
    }

    /**
     * @return StockProduct[]
     */
    public function getProducts()
    {
        return $this->products;
    }
}
