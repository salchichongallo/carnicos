<?php

namespace App\Repositories;

use App\Database\Table;
use Meat\Repositories\CityRepository;
use Meat\Repositories\ProductRepository;
use Illuminate\Database\ConnectionInterface as Connection;
use Meat\Repositories\PromotionRepository as PromotionRepositoryContract;

class PromotionRepository implements PromotionRepositoryContract
{
    /**
     * @var Connection
     */
    protected $db;

    /**
     * @var ProductRepository
     */
    protected $productRepository;

    /**
     * @var \Meat\Repositories\CityRepository
     */
    protected $cityRepository;

    public function __construct(
        Connection $db,
        CityRepository $cityRepository,
        ProductRepository $productRepository
    )
    {
        $this->db = $db;
        $this->productRepository = $productRepository;
        $this->cityRepository = $cityRepository;
    }

    public function findByCity(string $city)
    {
        $city = $this->cityRepository->find($city);

        $results = $this->db
            ->table(Table::PROMOTIONS)
            ->select('codigo_producto')
            ->where('ciudad_id', '=', $city->getId())
            ->get();

        return collect($results)->map(function ($result) {
            return $this->productRepository->find($result->codigo_producto);
        })->toArray();
    }

    public function add(string $city, string $product)
    {
        $city = $this->cityRepository->find($city);

        return $this->db
            ->table(Table::PROMOTIONS)
            ->insert([
                'ciudad_id' => $city->getId(),
                'codigo_producto' => $product,
            ]);
    }
}
