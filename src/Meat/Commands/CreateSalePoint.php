<?php

namespace Meat\Commands;

use Itm\Contracts\Bus\Command;

class CreateSalePoint implements Command
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $address;

    /**
     * @var string
     */
    public $phone;

    /**
     * @var string
     */
    public $cityId;
}
