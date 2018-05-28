<?php

namespace Meat\Handlers;

use DateTime;
use Itm\Contracts\Bus\Handler;
use Meat\Repositories\UserRepository;

class UpdateLastVisitUser implements Handler
{
    /**
     * @var \Meat\Repositories\UserRepository
     */
    protected $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param \Meat\Commands\UpdateLastVisitUser $command
     *
     * @return mixed|void
     */
    public function handle($command)
    {
        $user = $command->user;

        $lastVisit = new DateTime;

        $user->setLastVisit($lastVisit);

        $this->repository->updateVisit($user);
    }
}
