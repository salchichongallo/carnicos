<?php

namespace App\Database\Mappers;

use Meat\Sale\Sale;
use App\Database\Mapper;

class SaleMapper implements Mapper
{
    public function toTable(Sale $sale)
    {
        return [
            'id' => $sale->getId(),
            'total' => $sale->total(),
            'fecha' => $sale->getDate(),
            'cliente_id' => $sale->getClient()->getId(),
            'punto_venta_id' => $sale->getSalePoint()->getId(),
        ];
    }
}
