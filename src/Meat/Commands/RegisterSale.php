<?php

namespace Meat\Commands;

use Itm\Contracts\Bus\Command;

class RegisterSale implements Command
{
    /**
     * @var string
     */
    public $store;

    /**
     * @var string
     */
    public $customer;

    /**
     * @var string[]
     */
    public $products = [];

    public function add(string $product, int $quantity)
    {
        $this->products[] = [
            'code' => $product,
            'quantity' => $quantity,
        ];
    }
}
