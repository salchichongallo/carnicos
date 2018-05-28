<?php

namespace Meat\Handlers;

use Itm\Contracts\Bus\Handler;
use Meat\Repositories\UserRepository;

class CountLogin implements Handler
{
    /**
     * @var UserRepository
     */
    protected $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param  \Meat\Commands\CountLogin $command
     * @return void
     */
    public function handle($command)
    {
        $user = $command->user;

        $user->incrementLogins();

        $this->repository->updateTotalLogins($user);
    }
}
