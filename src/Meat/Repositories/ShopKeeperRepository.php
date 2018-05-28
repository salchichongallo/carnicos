<?php

namespace Meat\Repositories;

use Meat\Store\ShopKeeper;

interface ShopKeeperRepository
{
    public function add(ShopKeeper $shopKeeper): bool;
}
