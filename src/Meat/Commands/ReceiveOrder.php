<?php

namespace Meat\Commands;

use Itm\Contracts\Bus\Command;

class ReceiveOrder implements Command
{
    /**
     * @var string
     */
    public $order;

    /**
     * @var string
     */
    public $salePoint;
}
