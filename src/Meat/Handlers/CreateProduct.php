<?php

namespace Meat\Handlers;

use Itm\Contracts\Bus\Handler;
use Meat\Repositories\ProductRepository;
use Meat\Product\{Product, Presentation};

class CreateProduct implements Handler
{
    /**
     * @var \Meat\Repositories\ProductRepository
     */
    protected $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param \Meat\Commands\CreateProduct $command
     * @return void
     */
    public function handle($command)
    {
        $product = $this->createProduct($command);

        $this->repository->add($product);
    }

    /**
     * @param \Meat\Commands\CreateProduct $command
     *
     * @return \Meat\Product\Product
     */
    protected function createProduct($command): Product
    {
        $product = new Product;

        $product->setCode($command->code);
        $product->setName($command->name);
        $product->setPrice($command->price);

        $product->setPresentation(
            $this->createPresentation($command)
        );

        return $product;
    }

    /**
     * @param \Meat\Commands\CreateProduct $command
     *
     * @return Presentation
     */
    protected function createPresentation($command): Presentation
    {
        $presentation = new Presentation;

        $presentation->setId($command->presentation);

        return $presentation;
    }
}
