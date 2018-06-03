<?php

namespace App\Repositories;

use Exception;
use Meat\Store\Store;
use App\Database\Table;
use Meat\Sale\SaleProduct;
use Meat\Store\StockProduct;
use Meat\Repositories\CityRepository;
use App\Database\Mappers\StoreMapper;
use Illuminate\Database\ConnectionInterface as Connection;
use Meat\Repositories\StoreRepository as StoreRepositoryContract;

class StoreRepository implements StoreRepositoryContract
{
    /**
     * @var Connection
     */
    protected $db;

    /**
     * @var StoreMapper
     */
    protected $mapper;

    /**
     * @var CityRepository
     */
    protected $cityRepository;

    public function __construct(
        Connection $db,
        StoreMapper $mapper,
        CityRepository $cityRepository
    )
    {
        $this->db = $db;
        $this->mapper = $mapper;
        $this->cityRepository = $cityRepository;
    }

    public function all()
    {
        $stores = $this->db
            ->table(Table::STORES)
            ->get();

        return collect($stores)->map(function ($result) {
            $store = $this->mapper->fromTable($result);

            $store->setCity(
                $this->cityRepository->findById($result->ciudad_id)
            );

            return $store;
        });
    }

    public function add(Store $store): bool
    {
        return $this->db
            ->table(Table::STORES)
            ->insert($this->mapper->toTable(
                $store
            ));
    }

    public function find(string $id): Store
    {
        $store = $this->db
            ->table(Table::STORES)
            ->find($id);

        if (! $store) {
            throw new Exception("Store [{$id}] not found.");
        }

        return $this->mapper->fromTable($store);
    }

    public function findByShopKeeper(string $userId): Store
    {
        $result = $this->db
            ->table(Table::VIEW_SHOP_KEEPER_STORES)
            ->where('usuario', '=', $userId)
            ->first();

        if (! $result) {
            throw new Exception("Store for user [{$userId}] not found.");
        }

        return $this->mapper->fromTable($result);
    }

    public function addToStock(StockProduct $stockProduct)
    {
        if (! $this->inStock($stockProduct)) {
            $this->createStock($stockProduct);
        }

        $this->incrementStock($stockProduct);
    }

    protected function inStock(StockProduct $stockProduct): bool
    {
        return $this->queryForStock($stockProduct)->exists();
    }

    protected function createStock(StockProduct $stockProduct)
    {
        return $this->db
            ->table(Table::STOCKS)
            ->insert([
                'punto_venta_id' => $stockProduct->getStore()->getId(),
                'producto_codigo' => $stockProduct->getProduct()->getCode(),
                'stock' => 0,
            ]);
    }

    protected function incrementStock(StockProduct $stockProduct)
    {
        return $this
            ->queryForStock($stockProduct)
            ->increment('stock', $stockProduct->getStock());
    }

    protected function queryForStock(StockProduct $stockProduct)
    {
        return $this->db
            ->table(Table::STOCKS)
            ->where([
                'punto_venta_id' => $stockProduct->getStore()->getId(),
                'producto_codigo' => $stockProduct->getProduct()->getCode(),
            ]);
    }

    public function registerSale(SaleProduct $product)
    {
        $this->db
            ->table(Table::STOCKS)
            ->where([
                'punto_venta_id' => $product->getStore()->getId(),
                'producto_codigo' => $product->getProduct()->getCode(),
            ])
            ->decrement('stock', $product->getQuantity());
    }
}
