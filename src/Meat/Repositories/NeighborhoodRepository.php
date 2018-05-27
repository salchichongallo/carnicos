<?php

namespace Meat\Repositories;

use Meat\Street\Neighborhood;

interface NeighborhoodRepository
{
    public function find(string $id): Neighborhood;

    public function add(Neighborhood $neighborhood): bool;

    public function findByName(string $neighborhood): Neighborhood;
}
