<?php

namespace App\Repositories;

use Exception;
use Meat\Role\Role;
use App\Database\Table;
use App\Database\Mappers\RoleMapper;
use Illuminate\Database\ConnectionInterface as Connection;
use Meat\Repositories\RoleRepository as RoleRepositoryContract;

class RoleRepository implements RoleRepositoryContract
{
    /**
     * @var Connection
     */
    protected $db;

    /**
     * @var RoleMapper
     */
    protected $mapper;

    public function __construct(Connection $db, RoleMapper $mapper)
    {
        $this->db = $db;
        $this->mapper = $mapper;
    }

    public function add(Role $role): bool
    {
        return $this->db
            ->table(Table::ROLES)
            ->insert($this->mapper->toTable(
                $role
            ));
    }

    public function find(string $role): Role
    {
        $result = $this->db
            ->table(Table::ROLES)
            ->where('nombre', '=', $role)
            ->first();

        if (! $result) {
            throw new Exception("Role [{$role}] not found.");
        }

        return $this->mapper->fromTable($result);
    }
}
