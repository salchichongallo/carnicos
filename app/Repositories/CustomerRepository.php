<?php

namespace App\Repositories;

use Exception;
use Meat\User;
use App\Database\Table;
use Meat\Store\Customer;
use App\Database\Mappers\CustomerMapper;
use Illuminate\Database\ConnectionInterface as Connection;
use Meat\Repositories\CustomerRepository as CustomerRepositoryContract;

class CustomerRepository implements CustomerRepositoryContract
{
    /**
     * @var Connection
     */
    protected $db;

    /**
     * @var CustomerMapper
     */
    protected $mapper;

    public function __construct(Connection $db, CustomerMapper $mapper)
    {
        $this->db = $db;
        $this->mapper = $mapper;
    }

    public function add(Customer $customer): bool
    {
        return $this->db
            ->table(Table::CUSTOMERS)
            ->insert($this->mapper->toTable(
                $customer
            ));
    }

    public function findByUser(User $user): Customer
    {
        $result = $this->db
            ->table(Table::CUSTOMERS)
            ->where('usuario_id', '=', $user->getId())
            ->first();

        if (! $result) {
            throw new Exception("Customer with user [{$user->getId()}] not found.");
        }

        return $this->mapper->fromTableWithUser($result, $user);
    }

    public function markSurvey(Customer $customer): void
    {
        $this->db
            ->table(Table::CUSTOMERS)
            ->where('id', '=', $customer->getId())
            ->update([ 'encuesta_realizada' => true ]);
    }
}
