<?php

namespace Meat\Handlers;

use Itm\Contracts\Bus\Handler;
use Meat\Repositories\CustomerRepository;

class MarkSurvey implements Handler
{
    /**
     * @var CustomerRepository
     */
    protected $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    /**
     * @param  \Meat\Commands\MarkSurvey $command
     * @return void
     */
    public function handle($command): void
    {
        $this->customerRepository->markSurvey(
            $command->customer
        );
    }
}
