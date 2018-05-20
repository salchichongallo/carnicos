<?php

namespace Meat\Repositories;

use Meat\Product\Product;

interface ProductRepository
{
    public function add(Product $product): bool;

    public function find(string $code): Product;
}
