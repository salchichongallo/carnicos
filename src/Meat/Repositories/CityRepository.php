<?php

namespace Meat\Repositories;

use Meat\Street\City;

interface CityRepository
{
    public function all();

    public function add(City $city): bool;

    public function find(string $city): City;

    public function findById(string $id): City;

    public function updateVisits(City $city): bool;
}
