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
            'id' => $presentation->getId(),
            'descripcion' => $presentation->getDescription(),
        ];
    }

    public function fromTable(stdClass $table): Presentation
    {
        $presentation = new Presentation;

        $presentation->setId($table->id);
        $presentation->setDescription($table->descripcion);

        return $presentation;
    }

    public function fromProduct(stdClass $product): Presentation
    {
        $table = new stdClass;

        $table->id = $product->presentacion_id;
        $table->descripcion = $product->presentacion_descripcion;

        return $this->fromTable($table);
    }
}
