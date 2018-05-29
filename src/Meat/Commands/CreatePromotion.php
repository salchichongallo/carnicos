<?php

namespace Meat\Commands;

use Itm\Contracts\Bus\Command;

class CreatePromotion implements Command
{
    /**
     * @var string
     */
    public $city;

    /**
     * @var string
     */
    public $product;

    public function __construct(string $city, string $product)
    {
        $this->city = $city;
        $this->product = $product;
    }
}
