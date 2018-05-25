<?php

namespace Meat\Repositories;

use Meat\Street\City;

interface CityRepository
{
    public function all();

    public function add(City $city): bool;
}
