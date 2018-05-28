<?php

namespace App\Repositories;

use Exception;
use App\Database\Table;
use Meat\Street\Neighborhood;
use Meat\Repositories\CityRepository;
use App\Database\Mappers\NeighborhoodMapper;
use Illuminate\Database\ConnectionInterface as Connection;
use Meat\Repositories\NeighborhoodRepository as NeighborhoodRepositoryContract;

class NeighborhoodRepository implements NeighborhoodRepositoryContract
{
    /**
     * @var Connection
     */
    protected $db;

    /**
     * @var NeighborhoodMapper
     */
    protected $mapper;

    /**
     * @var CityRepository
     */
    protected $cityRepository;

    public function __construct(
        Connection $db,
        NeighborhoodMapper $mapper,
        CityRepository $cityRepository
    )
    {
        $this->db = $db;
        $this->mapper = $mapper;
        $this->cityRepository = $cityRepository;
    }

    public function all()
    {
        $neighborhoods = $this->db->table(Table::NEIGHBORHOODS)->get();

        return collect($neighborhoods)->map(function ($result) {
            $neighborhood = $this->mapper->fromTable($result);

            $neighborhood->setCity(
                $this->cityRepository->findById($result->ciudad_id)
            );

            return $neighborhood;

        })->toArray();
    }

    public function find(string $id): Neighborhood
    {
        $result = $this->db->table(Table::NEIGHBORHOODS)
            ->where('id', '=', $id)
            ->first();

        if (! $result) {
            throw new Exception("Neighborhood with id [{$id}] not found.");
        }

        $neighborhood = $this->mapper->fromTable($result);

        $neighborhood->setCity(
            $this->cityRepository->findById($result->ciudad_id)
        );

        return $neighborhood;
    }

    public function findByName(string $neighborhood): Neighborhood
    {
        $result = $this->db->table(Table::NEIGHBORHOODS)
            ->where('nombre', '=', $neighborhood)
            ->first();

        if (! $result) {
            throw new Exception("Neighborhood [{$neighborhood}] not found.");
        }

        $neighborhood = $this->mapper->fromTable($result);

        $neighborhood->setCity(
            $this->cityRepository->findById($result->ciudad_id)
        );

        return $neighborhood;
    }

    public function add(Neighborhood $neighborhood): bool
    {
        $id = $this->db->table(Table::NEIGHBORHOODS)
            ->insertGetId($this->mapper->toTable(
                $neighborhood
            ));

        $neighborhood->setId($id);

        return true;
    }
}
