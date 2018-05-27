<?php

namespace Meat\Handlers;

use Itm\Contracts\Bus\Handler;
use Meat\Repositories\CityRepository;
use Meat\Commands\RegisterVisit as Command;

class RegisterVisit implements Handler
{
    /**
     * @var CityRepository
     */
    protected $cityRepository;

    public function __construct(CityRepository $cityRepository)
    {
        $this->cityRepository = $cityRepository;
    }

    /**
     * @param Command $command
     * @return mixed|void
     */
    public function handle($command)
    {
        $this->incrementVisits($command->city);
    }

    protected function incrementVisits(string $city)
    {
        $city = $this->cityRepository->find($city);

        $city->incrementVisits();

        $this->cityRepository->updateVisits($city);
    }
}
