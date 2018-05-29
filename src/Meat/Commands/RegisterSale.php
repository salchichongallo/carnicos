<?php

namespace Meat\Commands;

use Itm\Contracts\Bus\Command;

class RegisterSale implements Command
{
    /**
     * @var string
     */
    public $salePoint;

    /**
     * @var string
     */
    public $client;

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
