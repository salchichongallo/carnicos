<?php

namespace Meat\Handlers;

use Itm\Contracts\Bus\Handler;
use Meat\Repositories\PromotionRepository;

class CreatePromotion implements Handler
{
    /**
     * @var PromotionRepository
     */
    protected $repository;

    /**
     * @param PromotionRepository $repository
     */
    public function __construct(PromotionRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param \Meat\Commands\CreatePromotion $command
     */
    public function handle($command)
    {
        $this->repository->add(
            $command->city,
            $command->product
        );
    }
}
