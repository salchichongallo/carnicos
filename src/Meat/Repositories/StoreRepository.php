<?php

namespace Meat\Repositories;

use Meat\Store\Store;
use Meat\Sale\SaleProduct;
use Meat\Store\StockProduct;

interface StoreRepository
{
    public function all();

    public function find(string $id): Store;

    public function add(Store $store): bool;

    public function addToStock(StockProduct $stockProduct);

    public function findByShopKeeper(string $userId): Store;

    public function registerSale(SaleProduct $product);
}
