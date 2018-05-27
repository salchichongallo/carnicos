<?php

namespace App\Database\Mappers;

use stdClass;
use App\Database\Mapper;
use Meat\Street\Neighborhood;

class NeighborhoodMapper implements Mapper
{
    public function toTable(Neighborhood $neighborhood): array
    {
        return [
            'id' => $neighborhood->getId(),
            'nombre' => $neighborhood->getName(),
            'ciudad_id' => $neighborhood->getCity()->getId(),
        ];
    }

    public function fromTable(stdClass $table): Neighborhood
    {
        $neighborhood = new Neighborhood;

        $neighborhood->setId($table->id);
        $neighborhood->setName($table->nombre);

        return $neighborhood;
    }
}
