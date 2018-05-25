<?php

namespace App\Database\Mappers;

use stdClass;
use Meat\Street\City;
use App\Database\Mapper;

class CityMapper implements Mapper
{
    public function forTable(City $city): array
    {
        return [
            'id' => $city->getId(),
            'nombre' => $city->getName(),
        ];
    }

    public function fromTable(stdClass $table): City
    {
        $city = new City;

        $city->setId($table->id);
        $city->setName($table->nombre);

        return $city;
    }
}
