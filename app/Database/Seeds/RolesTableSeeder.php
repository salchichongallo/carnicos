<?php

namespace App\Database\Seeds;

use Meat\Role\Role;
use App\Database\Table;
use Itm\Contracts\Database\Seeder;
use App\Database\Mappers\RoleMapper;
use Illuminate\Database\ConnectionInterface as Connection;

class RolesTableSeeder implements Seeder
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

    public function run(): void
    {
        $this->seed(Role::ADMIN, 'Administrador');

        $this->seed(Role::SHOP_KEEPER, 'Tendero');

        $this->seed(Role::CUSTOMER, 'Cliente');
    }

    protected function seed(string $name, $description = null)
    {
        $role = $this->createRole($name, $description);

        $this->db->table(Table::ROLES)
            ->insert($this->mapper->toTable(
                $role
            ));
    }

    protected function createRole(string $name, $description = null): Role
    {
        $role = new Role;

        $role->setName($name);

        if ($description) {
            $role->setDescription($description);
        }

        return $role;
    }
}
