<?php

namespace Meat\Repositories;

interface PromotionRepository
{
    public function findByCity(string $city);

    public function add(string $city, string $product);
}
