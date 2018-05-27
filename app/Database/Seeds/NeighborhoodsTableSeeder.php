<?php

namespace App\Database\Seeds;

use Meat\Street\City;
use Meat\Street\Neighborhood;
use Itm\Contracts\Database\Seeder;
use Meat\Repositories\CityRepository;
use Meat\Repositories\NeighborhoodRepository;

class NeighborhoodsTableSeeder implements Seeder
{
    /**
     * @var NeighborhoodRepository
     */
    protected $repository;

    /**
     * @var CityRepository
     */
    protected $cityRepository;

    public function __construct(
        NeighborhoodRepository $repository,
        CityRepository $cityRepository
    )
    {
        $this->repository = $repository;
        $this->cityRepository = $cityRepository;
    }

    public function run(): void
    {
        $cities = [
            'Medellín' => [
                'Bello',
            ],
        ];

        foreach ($cities as $cityName => $neighborhoods) {
            $city = $this->cityRepository->find($cityName);

            foreach ($neighborhoods as $neighborhood) {
                $this->seedNeighborhood(
                    $neighborhood, $city
                );
            }
        }
    }

    protected function seedNeighborhood(string $name, City $city)
    {
        $neighborhood = $this->createNeighborhood($name, $city);

        $this->repository->add($neighborhood);
    }

    protected function createNeighborhood(string $name, City $city): Neighborhood
    {
        $neighborhood = new Neighborhood;

        $neighborhood->setName($name);
        $neighborhood->setCity($city);

        return $neighborhood;
    }
}
