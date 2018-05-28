<?php

namespace Meat\Handlers;

use Meat\Commands\CountLogin;
use Itm\Contracts\Bus\Handler;
use Meat\Commands\UpdateLastVisitUser;

class RegisterLogin implements Handler
{
    /**
     * @param \Meat\Commands\RegisterLogin $command
     *
     * @return mixed|void
     */
    public function handle($command)
    {
        $user = $command->user;

        dispatch(new CountLogin($user));

        if (! $user->getLastVisit()) {
            dispatch(new UpdateLastVisitUser($user));
        }
    }
}
