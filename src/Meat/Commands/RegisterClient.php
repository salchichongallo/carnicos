<?php

namespace Meat\Commands;

use Itm\Contracts\Bus\Command;

class RegisterClient implements Command
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $id;

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
    public $neighborhoodId;

    /**
     * @var string
     */
    public $address;

    /**
     * @var string
     */
    public $phone;
}
