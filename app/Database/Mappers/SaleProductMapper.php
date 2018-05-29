<?php

namespace App\Database\Mappers;

use App\Database\Mapper;
use Meat\Sale\SaleProduct;

class SaleProductMapper implements Mapper
{
    public function toTable(SaleProduct $product)
    {
        return [
            'venta_id' => $product->getSale()->getId(),
            'producto_codigo' => $product->getProduct()->getCode(),
            'cantidad' => $product->getQuantity(),
        ];
    }
}
