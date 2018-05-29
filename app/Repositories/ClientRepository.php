<?php

namespace App\Repositories;

use Meat\Store\Client;
use App\Database\Table;
use App\Database\Mappers\ClientMapper;
use Illuminate\Database\ConnectionInterface as Connection;
use Meat\Repositories\ClientRepository as ClientRepositoryContract;

class ClientRepository implements ClientRepositoryContract
{
    /**
     * @var Connection
     */
    protected $db;

    /**
     * @var ClientMapper
     */
    protected $mapper;

    public function __construct(Connection $db, ClientMapper $mapper)
    {
        $this->db = $db;
        $this->mapper = $mapper;
    }

    public function add(Client $client): bool
    {
        return $this->db->table(Table::CLIENTS)
            ->insert($this->mapper->toTable(
                $client
            ));
    }
}
