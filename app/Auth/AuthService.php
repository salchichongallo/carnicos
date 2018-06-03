<?php

namespace App\Auth;

use Exception;
use Meat\User;
use Itm\Session\Session;
use Itm\Contracts\Hashing\Hasher;
use Meat\Repositories\UserRepository;
use Itm\Contracts\Foundation\Application;
use Meat\Contracts\Auth\AuthService as AuthServiceContract;

class AuthService implements AuthServiceContract
{
    /**
     * @var Application
     */
    protected $app;

    /**
     * @var Session
     */
    protected $session;

    /**
     * @var UserRepository
     */
    protected $repository;

    /**
     * @var Hasher
     */
    protected $hasher;

    public function __construct(
        Hasher $hasher,
        Session $session,
        Application $app,
        UserRepository $repository
    )
    {
        $this->app = $app;
        $this->hasher = $hasher;
        $this->session = $session;
        $this->repository = $repository;
    }

    public function attempt(string $email, string $password): User
    {
        try {
            $user = $this->repository->findByEmail($email);
        } catch (Exception $exception) {
            throw new AuthException('Invalid credentials: ' . $exception->getMessage());
        }

        if (is_null($user) || ! $this->hasher->check($password, $user->getPassword())) {
            throw new AuthException('Invalid credentials.');
        }

        $this->session->user = $user->getId();

        return $user;
    }

    public function forget(): void
    {
        $this->session->delete('user');
    }

    public function check(): bool
    {
        return $this->app->bound(User::class);
    }

    public function user():? User
    {
        return $this->app->make(User::class);
    }
}
