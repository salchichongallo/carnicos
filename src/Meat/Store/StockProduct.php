<?php

namespace Meat\Store;

use Exception;
use Meat\Product\Product;

class StockProduct
{
    protected const MIN_ALLOWED = 10;

    /**
     * @var int
     */
    protected $stock;

    /**
     * @var Product
     */
    protected $product;

    /**
     * @var SalePoint
     */
    protected $salePoint;

    public function needsReorder(int $orderStock): bool
    {
        if ($this->stock > $orderStock) {
            throw new Exception("Order stock [{$orderStock}] not valid.");
        }

        if ($orderStock === 0) {
            $orderStock = 1;
        }

        return ($this->stock * 100 / $orderStock) < self::MIN_ALLOWED;
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
     * @return SalePoint
     */
    public function getSalePoint()
    {
        return $this->salePoint;
    }

    /**
     * @param SalePoint $salePoint
     */
    public function setSalePoint(SalePoint $salePoint): void
    {
        $this->salePoint = $salePoint;
    }
}
