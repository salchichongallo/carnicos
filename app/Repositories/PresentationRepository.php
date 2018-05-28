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

    public function find(string $presentation): Presentation
    {
        $result = $this->db->table(Table::PRESENTATIONS)
            ->where('presentacion', '=', $presentation)
            ->first();

        if (! $result) {
            throw new Exception("Presentation [{$presentation}] not found.");
        }

        return $this->mapper->fromTable($result);
    }

    public function add(Presentation $presentation): bool
    {
        return $this->db->table(Table::PRESENTATIONS)
            ->insert($this->mapper->toTable(
                $presentation
            ));
    }

    public function exists(string $presentation): bool
    {
        return $this->db->table(Table::PRESENTATIONS)
            ->where('presentacion', '=', $presentation)
            ->limit(1)
            ->exists();
    }
}
