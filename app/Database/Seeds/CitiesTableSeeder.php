<?php

namespace App\Database\Seeds;

use Meat\Street\City;
use Itm\Contracts\Database\Seeder;
use Meat\Repositories\CityRepository;

class CitiesTableSeeder implements Seeder
{
    /**
     * @var CityRepository
     */
    protected $repository;

    public function __construct(CityRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(): void
    {
        $cities = [
            'Medellín',
            'Bogotá',
            'Manizales',
            'Pereira',
            'Cartagena',
        ];

        foreach ($cities as $city) {
            $this->seedCity($city);
        }
    }

    protected function seedCity(string $name)
    {
        $city = $this->createCity($name);

        return $this->repository->add($city);
    }

    protected function createCity(string $name): City
    {
        $city = new City;

        $city->setName($name);

        return $city;
    }
}
