<?php

namespace Meat\Commands;

use Itm\Contracts\Bus\Command;

class RegisterVisit implements Command
{
    /**
     * @var string
     */
    public $city;

    public function __construct(string $city)
    {
        $this->city = $city;
    }
}
