<?php

namespace App\Repositories;

use Exception;
use Meat\User;
use App\Database\Table;
use App\Database\Mappers\UserMapper;
use Meat\Repositories\RoleRepository;
use Meat\Repositories\NeighborhoodRepository;
use Illuminate\Database\ConnectionInterface as Connection;
use Meat\Repositories\UserRepository as UserRepositoryContract;

class UserRepository implements UserRepositoryContract
{
    /**
     * @var Connection
     */
    protected $db;

    /**
     * @var UserMapper
     */
    protected $mapper;

    /**
     * @var RoleRepository
     */
    protected $roleRepository;

    /**
     * @var NeighborhoodRepository
     */
    protected $neighborhoodRepository;

    public function __construct(
        Connection $db,
        UserMapper $mapper,
        RoleRepository $roleRepository,
        NeighborhoodRepository $neighborhoodRepository
    )
    {
        $this->db = $db;
        $this->mapper = $mapper;
        $this->roleRepository = $roleRepository;
        $this->neighborhoodRepository = $neighborhoodRepository;
    }

    public function add(User $user): bool
    {
        $id = $this->db
            ->table(Table::USERS)
            ->insertGetId($this->mapper->toTable(
                $user
            ));

        $user->setId($id);

        return true;
    }

    public function find(string $id): User
    {
        $result = $this->db
            ->table(Table::USERS)
            ->find($id);

        if (! $result) {
            throw new Exception("User with id [{$id}] not found.");
        }

        return $this->createUser($result);
    }

    protected function createUser($result): User
    {
        $user = $this->mapper->fromTable($result);

        $user->setRole(
            $this->roleRepository->find($result->rol)
        );

        $user->setNeighborhood(
            $this->neighborhoodRepository->find($result->barrio_id)
        );

        return $user;
    }

    public function findByEmail(string $email): User
    {
        $result = $this->db
            ->table(Table::USERS)
            ->where('email', '=', $email)
            ->first();

        if (! $result) {
            throw new Exception("User with email [{$email}] not found.");
        }

        return $this->createUser($result);
    }

    public function updateTotalLogins(User $user): bool
    {
        $result = $this->db
            ->table(Table::USERS)
            ->where('id', '=', $user->getId())
            ->update([ 'total_login' => $user->getTotalLogin() ]);

        return $result !== 0;
    }

    public function updateVisit(User $user)
    {
        return $this->db
            ->table(Table::USERS)
            ->where('id', '=', $user->getId())
            ->update([ 'ultimo_ingreso' => $user->getLastVisit() ]);
    }
}
