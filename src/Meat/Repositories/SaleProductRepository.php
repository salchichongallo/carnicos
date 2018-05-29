<?php

namespace Meat\Repositories;

use Meat\Sale\SaleProduct;

interface SaleProductRepository
{
    public function add(SaleProduct $product): bool;
}
