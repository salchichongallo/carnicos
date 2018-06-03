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
        $city = $this->db
            ->table(Table::CITIES)
            ->where('id', '=', $id)
            ->first();

        if (! $city) {
            throw new Exception("City with id [{$id}] not found.");
        }

        return $this->mapper->fromTable($city);
    }

    public function find(string $city): City
    {
        $result = $this->db
            ->table(Table::CITIES)
            ->where('nombre', '=', $city)
            ->first();

        if (! $result) {
            throw new Exception("City [{$city}] not found.");
        }

        $city = $this->mapper->fromTable($result);

        $city->setTotalVisits(
            $this->findVisits($city)
        );

        return $city;
    }

    protected function findVisits(City $city): int
    {
        $visitsTable = Table::VISITS;

        $result = $this->db
            ->table($visitsTable)
            ->where('ciudad_id', '=', $city->getId())
            ->first(['total']);

        if (! $result) {
            throw new Exception("City [{$city->getName()}] not found in {$visitsTable} table.");
        }

        return $result->total;
    }

    public function add(City $city): bool
    {
        $id = $this->db
            ->table(Table::CITIES)
            ->insertGetId($this->mapper->toTable(
                $city
            ));

        $city->setId($id);

        return true;
    }

    public function all()
    {
        $cities = $this->db
            ->table(Table::CITIES)
            ->get();

        return collect($cities)->map(function ($city) {
            return $this->mapper->fromTable($city);
        })->toArray();
    }

    public function updateVisits(City $city): bool
    {
        $result = $this->db
            ->table(Table::VISITS)
            ->where('ciudad_id', '=', $city->getId())
            ->update([ 'total' => $city->getTotalVisits() ]);

        return $result !== 0;
    }
}
