<?php

namespace Meat\Repositories;

use Meat\Store\SalePoint;
use Meat\Store\StockProduct;

interface SalePointRepository
{
    public function all();

    public function add(SalePoint $pointSale): bool;

    public function findByShopKeeper(string $userId);

    public function addToStock(StockProduct $stockProduct);
}
