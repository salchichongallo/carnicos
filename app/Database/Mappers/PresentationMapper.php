<?php

namespace App\Database\Mappers;

use stdClass;
use App\Database\Mapper;
use Meat\Product\Presentation;

class PresentationMapper implements Mapper
{
    public function toTable(Presentation $presentation): array
    {
        return [
            'presentacion' => $presentation->getId(),
            'descripcion' => $presentation->getDescription(),
        ];
    }

    public function fromTable(stdClass $table): Presentation
    {
        $presentation = new Presentation;

        $presentation->setId($table->presentacion);
        $presentation->setDescription($table->descripcion);

        return $presentation;
    }
}
