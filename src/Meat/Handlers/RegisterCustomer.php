<?php

namespace Meat\Handlers;

use Meat\User;
use Meat\Role\Role;
use Meat\Store\Customer;
use Meat\Commands\CreateUser;
use Itm\Contracts\Bus\Handler;
use Meat\Repositories\CustomerRepository;

class RegisterCustomer implements Handler
{
    /**
     * @var CustomerRepository
     */
    protected $repository;

    /**
     * @var \Meat\Commands\RegisterCustomer
     */
    protected $command;

    /**
     * @param CustomerRepository $repository
     */
    public function __construct(CustomerRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param \Meat\Commands\RegisterCustomer $command
     *
     * @return mixed|void
     */
    public function handle($command)
    {
        $this->command = $command;

        $customer = $this->createCustomer();

        $this->assignUser($customer);

        $this->repository->add($customer);
    }

    protected function createCustomer(): Customer
    {
        $customer = new Customer;

        $customer->setId($this->command->id);

        return $customer;
    }

    protected function assignUser(Customer $customer): void
    {
        $customer->setUser(
            $this->createUserForCustomer()
        );
    }

    protected function createUserForCustomer(): User
    {
        $createUser = new CreateUser;

        $createUser->name = $this->command->name;
        $createUser->email = $this->command->email;
        $createUser->password = $this->command->password;
        $createUser->address = $this->command->address;
        $createUser->phone = $this->command->phone;
        $createUser->neighborhoodId = $this->command->neighborhoodId;

        $createUser->role = Role::CUSTOMER;

        return dispatch($createUser);
    }
}
