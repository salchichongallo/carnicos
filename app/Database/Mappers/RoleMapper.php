<?php

namespace App\Database\Mappers;

use stdClass;
use Meat\Role\Role;
use App\Database\Mapper;

class RoleMapper implements Mapper
{
    public function toTable(Role $role): array
    {
        return [
            'nombre' => $role->getName(),
            'descripcion' => $role->getDescription(),
        ];
    }

    public function fromTable(stdClass $table): Role
    {
        $role = new Role;

        $role->setName($table->nombre);
        $role->setDescription($table->descripcion ?? '');

        return $role;
    }
}
