<?php

namespace App\Database\Mappers;

use stdClass;
use App\Database\Mapper;
use Meat\Product\Product;

class ProductMapper implements Mapper
{
    public function forInsert(Product $product): array
    {
        return [
            'codigo' => $product->getCode(),
            'nombre' => $product->getName(),
            'precio' => $product->getPrice(),
            'presentacion' => $product->getPresentation()->getId(),
        ];
    }

    public function fromTable(stdClass $table): Product
    {
        $product = new Product;

        $product->setCode($table->codigo);
        $product->setName($table->nombre);
        $product->setPrice($table->precio);

        return $product;
    }
}
