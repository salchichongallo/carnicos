<?php

namespace Meat\Auth;

use Exception;
use Meat\User;
use Itm\Contracts\Hashing\Hasher;
use Meat\Repositories\UserRepository;
use Meat\Contracts\Auth\AuthService as AuthServiceContract;

class AuthService implements AuthServiceContract
{
    /**
     * @var UserRepository
     */
    protected $repository;

    /**
     * @var Hasher
     */
    protected $hasher;

    public function __construct(UserRepository $repository, Hasher $hasher)
    {
        $this->hasher = $hasher;
        $this->repository = $repository;
    }

    public function attempt(string $email, string $password): User
    {
        $user = $this->repository->findByEmail($email);

        if (! $this->hasher->check($password, $user->getPassword())) {
            throw new Exception('Invalid credentials.');
        }

        return $user;
    }
}
