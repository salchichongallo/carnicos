<?php

namespace App\Repositories;

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
}
