<?php

namespace App\Database\Seeds;

use DateTime;
use Meat\User;
use Meat\Role\Role;
use Itm\Contracts\Database\Seeder;
use App\Database\Mappers\UserMapper;
use Meat\Repositories\CityRepository;
use Meat\Repositories\RoleRepository;
use Meat\Repositories\UserRepository;
use Meat\Repositories\NeighborhoodRepository;

class UsersTableSeeder implements Seeder
{
    /**
     * @var UserRepository
     */
    protected $repository;

    /**
     * @var UserMapper
     */
    protected $mapper;

    /**
     * @var RoleRepository
     */
    protected $roleRepository;

    /**
     * @var CityRepository
     */
    protected $cityRepository;

    /**
     * @var NeighborhoodRepository
     */
    protected $neighborhoodRepository;

    public function __construct(
        UserMapper $mapper,
        UserRepository $repository,
        RoleRepository $roleRepository,
        CityRepository $cityRepository,
        NeighborhoodRepository $neighborhoodRepository
    )
    {
        $this->mapper = $mapper;
        $this->repository = $repository;
        $this->roleRepository = $roleRepository;
        $this->cityRepository = $cityRepository;
        $this->neighborhoodRepository = $neighborhoodRepository;
    }

    public function run(): void
    {
        $this->seedAdmin();
    }

    protected function seedAdmin(): void
    {
        $admin = new User;

        $admin->setName('Admin');
        $admin->setEmail('admin@carnicos.co');
        $admin->setPassword(bcrypt('secret'));
        $admin->setAddress('King\'s Cross Station');
        $admin->setPhone('123 45 67');

        $admin->setLastVisit(new DateTime);

        $admin->setRole(
            $this->roleRepository->find(Role::ADMIN)
        );

        $admin->setNeighborhood(
            $this->neighborhoodRepository->findByName('Bello')
        );

        $this->repository->add($admin);
    }
}
