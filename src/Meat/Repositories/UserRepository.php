<?php

namespace Meat\Repositories;

use Meat\User;

interface UserRepository
{
    public function find(string $id): User;

    public function add(User $user): bool;

    public function updateVisit(User $user);

    public function findByEmail(string $email): User;

    public function updateTotalLogins(User $user): bool;
}
