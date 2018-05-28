<?php

namespace App\Database\Mappers;

use stdClass;
use App\Database\Mapper;
use Meat\Store\SalePoint;

class SalePointMapper implements Mapper
{
    public function toTable(SalePoint $salePoint): array
    {
        return [
            'id' => $salePoint->getId(),
            'nombre' => $salePoint->getName(),
            'direccion' => $salePoint->getAddress(),
            'telefono' => $salePoint->getPhone(),
            'ciudad_id' => $salePoint->getCity()->getId(),
        ];
    }

    public function fromTable(stdClass $table): SalePoint
    {
        $salePoint = new SalePoint;

        $salePoint->setId($table->id);
        $salePoint->setName($table->nombre);
        $salePoint->setAddress($table->direccion);
        $salePoint->setPhone($table->telefono);

        return $salePoint;
    }
}
