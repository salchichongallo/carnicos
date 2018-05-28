<?php

namespace App\Repositories;

use App\Database\Table;
use Meat\Store\SalePoint;
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
}
