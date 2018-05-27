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
        return $this->db->table(Table::USERS)
            ->insert($this->mapper->toTable(
                $user
            ));
    }

    public function findByEmail(string $email): User
    {
        $result = $this->db->table(Table::USERS)
            ->where('email', '=', $email)
            ->first();

        if (! $result) {
            throw new Exception("User with email [{$email}] not found.");
        }

        $user = $this->mapper->fromTable($result);

        $user->setRole(
            $this->roleRepository->find($result->rol)
        );

        $user->setNeighborhood(
            $this->neighborhoodRepository->find($result->barrio_id)
        );

        return $user;
    }
}
