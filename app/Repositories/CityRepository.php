<?php

namespace App\Repositories;

use Meat\Street\City;
use App\Database\Table;
use App\Database\Mappers\CityMapper;
use Illuminate\Database\ConnectionInterface as Connection;
use Meat\Repositories\CityRepository as CityRepositoryContract;

class CityRepository implements CityRepositoryContract
{
    /**
     * @var Connection
     */
    protected $db;

    /**
     * @var CityMapper
     */
    protected $mapper;

    public function __construct(Connection $db, CityMapper $mapper)
    {
        $this->db = $db;
        $this->mapper = $mapper;
    }

    public function add(City $city): bool
    {
        return $this->db->table(Table::CITIES)
            ->insert($this->mapper->forTable(
                $city
            ));
    }

    public function all()
    {
        $cities = $this->db->table(Table::CITIES)->get();

        return collect($cities)->map(function ($city) {
            return $this->mapper->fromTable($city);
        })->toArray();
    }
}
