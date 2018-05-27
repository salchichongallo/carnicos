<?php

namespace Meat\Contracts\Auth;

use Meat\User;

interface AuthService
{
    public function attempt(string $email, string $password): User;
}
