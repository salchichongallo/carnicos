<?php

namespace Meat\Handlers;

use Meat\User;
use Meat\Role\Role;
use Meat\Store\Client;
use Meat\Commands\CreateUser;
use Itm\Contracts\Bus\Handler;
use Meat\Repositories\ClientRepository;

class RegisterClient implements Handler
{
    /**
     * @var ClientRepository
     */
    protected $repository;

    /**
     * @var \Meat\Commands\RegisterClient
     */
    protected $command;

    /**
     * @param ClientRepository $repository
     */
    public function __construct(ClientRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param \Meat\Commands\RegisterClient $command
     *
     * @return mixed|void
     */
    public function handle($command)
    {
        $this->command = $command;

        $client = $this->createClient();

        $this->assignUser($client);

        $this->repository->add($client);
    }

    protected function createClient(): Client
    {
        $client = new Client;

        $client->setId($this->command->id);

        return $client;
    }

    protected function assignUser(Client $client): void
    {
        $client->setUser(
            $this->createUserForClient()
        );
    }

    protected function createUserForClient(): User
    {
        $createUser = new CreateUser;

        $createUser->name = $this->command->name;
        $createUser->email = $this->command->email;
        $createUser->password = $this->command->password;
        $createUser->address = $this->command->address;
        $createUser->phone = $this->command->phone;
        $createUser->neighborhoodId = $this->command->neighborhoodId;

        $createUser->role = Role::CLIENT;

        return dispatch($createUser);
    }
}
