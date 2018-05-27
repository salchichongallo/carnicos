<?php

namespace Meat\Repositories;

use Meat\User;

interface UserRepository
{
    public function add(User $user): bool;

    public function findByEmail(string $email): User;
}
