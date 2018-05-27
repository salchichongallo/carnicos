<?php

namespace App\Repositories;

use Exception;
use App\Database\Table;
use Meat\Product\Presentation;
use App\Database\Mappers\PresentationMapper;
use Illuminate\Database\ConnectionInterface as Connection;
use Meat\Repositories\PresentationRepository as PresentationRepositoryContract;

class PresentationRepository implements PresentationRepositoryContract
{
    /**
     * @var Connection
     */
    protected $db;

    /**
     * @var PresentationMapper
     */
    protected $mapper;

    public function __construct(Connection $db, PresentationMapper $mapper)
    {
        $this->db = $db;
        $this->mapper = $mapper;
    }

    /**
     * @param string $id
     * @return Presentation
     * @throws Exception
     */
    public function find(string $id): Presentation
    {
        $presentation = $this->db->table(Table::PRESENTATIONS)->find($id);

        if (! $presentation) {
            throw new Exception("Presentation [{$id}] not found.");
        }

        return $this->mapper->fromTable($presentation);
    }

    public function add(Presentation $presentation): bool
    {
        return $this->db
            ->table(Table::PRESENTATIONS)
            ->insert($this->mapper->toTable(
                $presentation
            ));
    }
}
