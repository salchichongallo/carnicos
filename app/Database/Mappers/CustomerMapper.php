<?php

namespace App\Database\Mappers;

use stdClass;
use Meat\User;
use Meat\Store\Customer;
use App\Database\Mapper;

class CustomerMapper implements Mapper
{
    public function toTable(Customer $customer): array
    {
        return [
            'id' => $customer->getId(),
            'usuario_id' => $customer->getUser()->getId(),
            'encuesta_realizada' => $customer->surveyMade(),
        ];
    }

    public function fromTable(stdClass $table): Customer
    {
        $customer = new Customer;

        $customer->setId($table->id);
        $customer->setSurveyMade($table->encuesta_realizada);

        return $customer;
    }

    public function fromTableWithUser(stdClass $table, User $user): Customer
    {
        $customer = $this->fromTable($table);

        $customer->setUser($user);

        return $customer;
    }
}
