<?php

namespace Meat\Handlers;

use Meat\Store\Store;
use Itm\Contracts\Bus\Handler;
use Meat\Repositories\CityRepository;
use Meat\Repositories\StoreRepository;

class CreateStore implements Handler
{
    /**
     * @var CityRepository
     */
    protected $cityRepository;

    /**
     * @var StoreRepository
     */
    protected $storeRepository;

    public function __construct(
        CityRepository $cityRepository,
        StoreRepository $storeRepository
    )
    {
        $this->cityRepository = $cityRepository;

        $this->storeRepository = $storeRepository;
    }

    /**
     * @param \Meat\Commands\CreateStore $command
     */
    public function handle($command)
    {
        $store = $this->createStore($command);

        $store->setCity(
            $this->cityRepository->findById($command->cityId)
        );

        $this->storeRepository->add($store);
    }

    /**
     * @param \Meat\Commands\CreateStore $command
     *
     * @return Store
     */
    protected function createStore($command): Store
    {
        $store = new Store;

        $store->setId($command->id);
        $store->setName($command->name);
        $store->setAddress($command->address);
        $store->setPhone($command->phone);

        return $store;
    }
}
