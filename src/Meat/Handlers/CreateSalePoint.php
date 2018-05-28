<?php

namespace Meat\Handlers;

use Meat\Store\SalePoint;
use Itm\Contracts\Bus\Handler;
use Meat\Repositories\CityRepository;
use Meat\Repositories\SalePointRepository;

class CreateSalePoint implements Handler
{
    /**
     * @var CityRepository
     */
    protected $cityRepository;

    /**
     * @var SalePointRepository
     */
    protected $salePointRepository;

    public function __construct(
        CityRepository $cityRepository,
        SalePointRepository $salePointRepository
    )
    {
        $this->cityRepository = $cityRepository;

        $this->salePointRepository = $salePointRepository;
    }

    /**
     * @param \Meat\Commands\CreateSalePoint $command
     */
    public function handle($command)
    {
        $salePoint = $this->createSalePoint($command);

        $salePoint->setCity(
            $this->cityRepository->findById($command->cityId)
        );

        $this->salePointRepository->add($salePoint);
    }

    /**
     * @param \Meat\Commands\CreateSalePoint $command
     * @return SalePoint
     */
    protected function createSalePoint($command): SalePoint
    {
        $salePoint = new SalePoint;

        $salePoint->setId($command->id);
        $salePoint->setName($command->name);
        $salePoint->setAddress($command->address);
        $salePoint->setPhone($command->phone);

        return $salePoint;
    }
}
