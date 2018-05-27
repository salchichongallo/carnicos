<?php

namespace Meat\Repositories;

use Meat\Role\Role;

interface RoleRepository
{
    public function add(Role $role): bool;

    public function find(string $role): Role;
}
