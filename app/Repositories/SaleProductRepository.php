<?php

namespace App\Repositories;

use App\Database\Table;
use Meat\Sale\SaleProduct;
use App\Database\Mappers\SaleProductMapper;
use Illuminate\Database\ConnectionInterface as Connection;
use Meat\Repositories\SaleProductRepository as SaleProductRepositoryContract;

class SaleProductRepository implements SaleProductRepositoryContract
{
    /**
     * @var Connection
     */
    protected $db;

    /**
     * @var SaleProductMapper
     */
    protected $mapper;

    public function __construct(
        Connection $db,
        SaleProductMapper $mapper
    )
    {
        $this->db = $db;
        $this->mapper = $mapper;
    }

    public function add(SaleProduct $product): bool
    {
        return $this->db
            ->table(Table::SALE_PRODUCTS)
            ->insert($this->mapper->toTable(
                $product
            ));
    }
}
