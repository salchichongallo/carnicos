<?php

namespace App\Repositories;

use Exception;
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

    public function findById(string $id): City
    {
        $city = $this->db->table(Table::CITIES)
            ->where('id', '=', $id)
            ->first();

        if (! $city) {
            throw new Exception("City with id [{$id}] not found.");
        }

        return $this->mapper->fromTable($city);
    }

    public function find(string $city): City
    {
        $result = $this->db->table(Table::CITIES)
            ->where('nombre', '=', $city)
            ->first();

        if (! $result) {
            throw new Exception("City [{$city}] not found.");
        }

        return $this->mapper->fromTable($result);
    }

    public function add(City $city): bool
    {
        return $this->db->table(Table::CITIES)
            ->insert($this->mapper->toTable(
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
