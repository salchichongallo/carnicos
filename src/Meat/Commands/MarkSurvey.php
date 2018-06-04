<?php

namespace Meat\Commands;

use Meat\Store\Customer;
use Itm\Contracts\Bus\Command;

class MarkSurvey implements Command
{
    /**
     * @var \Meat\Store\Customer
     */
    public $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }
}
