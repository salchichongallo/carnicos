<?php

namespace Meat\Commands;

use Itm\Contracts\Bus\Command;

class RegisterShopKeeper implements Command
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $nit;

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
    public $storeId;

    /**
     * @var string
     */
    public $address;

    /**
     * @var string
     */
    public $phone;
}
