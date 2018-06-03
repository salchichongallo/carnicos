<?php

namespace Meat\Commands;

use Itm\Contracts\Bus\Command;

class MakeOrder implements Command
{
    /**
     * @var string
     */
    public $code;

    /**
     * @var string
     */
    public $store;

    /**
     * @var array
     */
    public $products = [];

    public function add(string $product, int $quantity)
    {
        $this->products[] = [
            'id' => $product,
            'quantity' => $quantity,
        ];
    }
}
