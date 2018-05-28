<?php

namespace Meat\Contracts\Auth;

use Meat\User;

interface AuthService
{
    public function user():? User;

    public function check(): bool;

    public function forget(): void;

    public function attempt(string $email, string $password): User;
}
