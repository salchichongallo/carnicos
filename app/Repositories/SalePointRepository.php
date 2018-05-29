<?php

namespace App\Repositories;

use Exception;
use App\Database\Table;
use Meat\Store\SalePoint;
use Meat\Store\StockProduct;
use Meat\Repositories\CityRepository;
use App\Database\Mappers\SalePointMapper;
use Illuminate\Database\ConnectionInterface as Connection;
use Meat\Repositories\SalePointRepository as SalePointRepositoryContract;

class SalePointRepository implements SalePointRepositoryContract
{
    /**
     * @var Connection
     */
    protected $db;

    /**
     * @var SalePointMapper
     */
    protected $mapper;

    /**
     * @var CityRepository
     */
    protected $cityRepository;

    public function __construct(
        Connection $db,
        SalePointMapper $mapper,
        CityRepository $cityRepository
    )
    {
        $this->db = $db;
        $this->mapper = $mapper;
        $this->cityRepository = $cityRepository;
    }

    public function all()
    {
        $salePoints = $this->db->table(Table::SALE_POINTS)->get();

        return collect($salePoints)->map(function ($result) {
            $salePoint = $this->mapper->fromTable($result);

            $salePoint->setCity(
                $this->cityRepository->findById($result->ciudad_id)
            );

            return $salePoint;
        });
    }

    public function add(SalePoint $salePoint): bool
    {
        return $this->db->table(Table::SALE_POINTS)
            ->insert($this->mapper->toTable(
                $salePoint
            ));
    }

    public function findByShopKeeper(string $userId)
    {
        $result = $this->db->table(Table::VIEW_SHOP_KEEPER_SALE_POINTS)
            ->where('usuario', '=', $userId)
            ->first();

        if (! $result) {
            throw new Exception("SalePoint for user [{$userId}] not found.");
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
                'punto_venta_id' => $stockProduct->getSalePoint()->getId(),
                'producto_codigo' => $stockProduct->getProduct()->getCode(),
                'stock' => 0,
            ]);
    }

    protected function incrementStock(StockProduct $stockProduct)
    {
        $stock = $stockProduct->getStock();

        return $this->queryForStock($stockProduct)->increment('stock', $stock);
    }

    protected function queryForStock(StockProduct $stockProduct)
    {
        return $this->db
            ->table(Table::STOCKS)
            ->where([
                'punto_venta_id' => $stockProduct->getSalePoint()->getId(),
                'producto_codigo' => $stockProduct->getProduct()->getCode(),
            ]);
    }
}
