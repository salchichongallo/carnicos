<?php

namespace App\Repositories;

use Meat\Sale\Sale;
use App\Database\Table;
use App\Database\Mappers\SaleMapper;
use Meat\Repositories\StoreRepository;
use Meat\Repositories\SaleProductRepository;
use Illuminate\Database\ConnectionInterface as Connection;
use Meat\Repositories\SaleRepository as SaleRepositoryContract;

class SaleRepository implements SaleRepositoryContract
{
    /**
     * @var Connection
     */
    protected $db;

    /**
     * @var SaleMapper
     */
    protected $mapper;

    /**
     * @var SaleProductRepository
     */
    protected $saleProductRepository;

    /**
     * @var StoreRepository
     */
    protected $storeRepository;

    public function __construct(
        Connection $db,
        SaleMapper $mapper,
        StoreRepository $storeRepository,
        SaleProductRepository $saleProductRepository
    )
    {
        $this->db = $db;
        $this->mapper = $mapper;
        $this->storeRepository = $storeRepository;
        $this->saleProductRepository = $saleProductRepository;
    }


    public function add(Sale $sale): bool
    {
       $id = $this->db
           ->table(Table::SALES)
           ->insertGetId($this->mapper->toTable(
               $sale
           ));

       $sale->setId($id);

       $this->addProducts($sale);

       return true;
    }

    protected function addProducts(Sale $sale): void
    {
        foreach ($sale->getProducts() as $product) {
            $this->saleProductRepository->add($product);

            $this->storeRepository->registerSale($product);
        }
    }
}
