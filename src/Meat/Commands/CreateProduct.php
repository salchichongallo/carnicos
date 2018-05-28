<?php

namespace Meat\Commands;

use Itm\Contracts\Bus\Command;

class CreateProduct implements Command
{
    /**
     * @var string
     */
    public $code;

    /**
     * @var string
     */
    public $name;

    /**
     * @var float
     */
    public $price;

    /**
     * @var string
     */
    public $presentation;
}
