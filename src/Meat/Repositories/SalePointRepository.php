<?php

namespace Meat\Repositories;

use Meat\Store\SalePoint;
use Meat\Sale\SaleProduct;
use Meat\Store\StockProduct;

interface SalePointRepository
{
    public function all();

    public function find(string $id): SalePoint;

    public function add(SalePoint $pointSale): bool;

    public function addToStock(StockProduct $stockProduct);

    public function findByShopKeeper(string $userId): SalePoint;

    public function registerSale(SaleProduct $product);
}
