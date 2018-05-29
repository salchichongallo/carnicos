<?php

namespace Meat\Repositories;

use Meat\Store\Client;

interface ClientRepository
{
    public function add(Client $client): bool;
}
