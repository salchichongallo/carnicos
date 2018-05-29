<?php

namespace App\Database\Seeds;

use Itm\Contracts\Database\Seeder;
use Meat\Commands\CreatePromotion;
use Meat\Repositories\CityRepository;

class PromotionsTableSeeder implements Seeder
{
    /**
     * @var CityRepository
     */
    protected $cityRepository;

    /**
     * @param CityRepository $cityRepository
     */
    public function __construct(CityRepository $cityRepository)
    {
        $this->cityRepository = $cityRepository;
    }

    public function run(): void
    {
        foreach ($this->cities() as $city => $products) {
            foreach ($products as $product) {
                dispatch(
                    new CreatePromotion($city, $product)
                );
            }
        }
    }

    public function cities(): array
    {
        return [
            'Medellín' => [
                'chor1',
                'mor2',
                'schon2',
                'schon1',
            ],
            'Bogotá' => [
                'cost1',
                'morc1',
                'schon1',
            ],
            'Manizales' => [
                'sala1',
                'sala2',
            ],
            'Pereira' => [],
            'Cartagena' => [
                'mor2',
                'morc2',
            ],
        ];
    }
}
