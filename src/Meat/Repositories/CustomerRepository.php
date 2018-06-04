<?php

namespace Meat\Repositories;

use Meat\User;
use Meat\Store\Customer;

interface CustomerRepository
{
    public function add(Customer $customer): bool;

    public function findByUser(User $user): Customer;

    public function markSurvey(Customer $customer): void;
}
