<?php

namespace Meat\Commands;

use Itm\Contracts\Bus\Command;

class CreateUser implements Command
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $password;

    /**
     * @var string
     */
    public $address;

    /**
     * @var string
     */
    public $phone;

    /**
     * @var int
     */
    public $totalLogin;

    /**
     * @var \DateTime
     */
    public $lastVisit;

    /**
     * @var string
     */
    public $neighborhoodId;

    /**
     * @var string
     */
    public $role;
}
