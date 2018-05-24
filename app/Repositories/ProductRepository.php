<?php

namespace App\Repositories;

use Exception;
use App\Database\Table;
use Meat\Product\Product;
use App\Database\Mappers\ProductMapper;
use Illuminate\Database\ConnectionInterface as Connection;
use Meat\Repositories\ProductRepository as ProductRepositoryContract;

class ProductRepository implements ProductRepositoryContract
{
    /**
     * @var Connection
     */
    protected $db;

    /**
     * @var ProductMapper
     */
    protected $mapper;

    public function __construct(Connection $db, ProductMapper $mapper)
    {
        $this->db = $db;
        $this->mapper = $mapper;
    }

    public function add(Product $product): bool
    {
        return $this->db
            ->table(Table::PRODUCTS)
            ->insert($this->mapper->forInsert(
                $product
            ));
    }

    /**
     * @param string $code
     * @return Product
     * @throws Exception
     */
    public function find(string $code): Product
    {
        $product = $this->db->table(Table::VIEW_PRODUCTS)
            ->where('codigo', '=', $code)->first();

        if (! $product) {
            throw new Exception("Product [{$code}] not found.");
        }

        return $this->mapper->fromView($product);
    }
}
