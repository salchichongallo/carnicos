<?php

namespace Meat\Repositories;

use Meat\Store\Customer;

interface CustomerRepository
{
    public function add(Customer $customer): bool;
}
