<?php

namespace Meat\Repositories;

use Meat\Sale\Sale;

interface SaleRepository
{
    public function add(Sale $sale): bool;
}
