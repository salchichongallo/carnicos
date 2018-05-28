<?php

namespace Meat\Repositories;

use Meat\Store\SalePoint;

interface SalePointRepository
{
    public function all();

    public function add(SalePoint $pointSale): bool;
}
