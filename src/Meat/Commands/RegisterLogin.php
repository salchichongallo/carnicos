<?php

namespace Meat\Commands;

use Meat\User;
use Itm\Contracts\Bus\Command;

class RegisterLogin implements Command
{
    /**
     * @var User
     */
    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
}
