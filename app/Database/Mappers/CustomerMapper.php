<?php

namespace App\Database\Mappers;

use stdClass;
use Meat\Store\Customer;
use App\Database\Mapper;

class CustomerMapper implements Mapper
{
    public function toTable(Customer $customer): array
    {
        return [
            'id' => $customer->getId(),
            'usuario_id' => $customer->getUser()->getId(),
        ];
    }

    public function fromTable(stdClass $table): Customer
    {
        $customer = new Customer;

        $customer->setId($table->id);

        return $customer;
    }
}
