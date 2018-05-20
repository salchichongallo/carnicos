<?php

namespace App\Database\Mappers;

use stdClass;
use App\Database\Mapper;
use Meat\Product\Product;

class ProductMapper implements Mapper
{
    /**
     * @var PresentationMapper
     */
    protected $presentation;

    public function __construct(PresentationMapper $presentationMapper)
    {
        $this->presentation = $presentationMapper;
    }

    public function forInsert(Product $product): array
    {
        return [
            'codigo' => $product->getCode(),
            'nombre' => $product->getName(),
            'precio' => $product->getPrice(),
            'presentacion_id' => $product->getPresentation()->getId()
        ];
    }

    public function fromView(stdClass $table): Product
    {
        $product = new Product;

        $product->setCode($table->codigo);
        $product->setName($table->nombre);
        $product->setPrice($table->precio);

        $product->setPresentation(
            $this->presentation->fromProduct($table)
        );

        return $product;
    }
}
