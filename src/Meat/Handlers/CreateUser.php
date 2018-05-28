<?php

namespace Meat\Handlers;

use Meat\User;
use Meat\Role\Role;
use Itm\Contracts\Bus\Handler;
use Meat\Repositories\UserRepository;
use Meat\Repositories\NeighborhoodRepository;

class CreateUser implements Handler
{
    /**
     * @var UserRepository
     */
    protected $repository;

    /**
     * @var NeighborhoodRepository
     */
    protected $neighborhoodRepository;

    public function __construct(
        UserRepository $repository,
        NeighborhoodRepository $neighborhoodRepository
    )
    {
        $this->repository = $repository;
        $this->neighborhoodRepository = $neighborhoodRepository;
    }

    /**
     * @param  \Meat\Commands\CreateUser $command
     * @return User
     */
    public function handle($command)
    {
        $user = $this->createUser($command);

        $user->setRole(Role::create($command->role));

        $this->assignNeighborhood($user, $command);

        $this->repository->add($user);

        return $user;
    }

    /**
     * @param  \Meat\Commands\CreateUser $command;
     * @return User
     */
    protected function createUser($command): User
    {
        $user = new User;

        $user->setName($command->name);
        $user->setEmail($command->email);

        $user->setPassword(
            bcrypt($command->password)
        );

        $user->setAddress($command->address);
        $user->setPhone($command->phone);

        return $user;
    }

    /**
     * @param User $user
     * @param \Meat\Commands\CreateUser $command
     * @return void
     */
    protected function assignNeighborhood(User $user, $command): void
    {
        $neighborhood = $this->neighborhoodRepository
            ->find($command->neighborhoodId);

        $user->setNeighborhood($neighborhood);
    }
}
