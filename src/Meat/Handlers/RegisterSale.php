<?php

namespace Meat\Handlers;

use Meat\Store\Client;
use Meat\Store\SalePoint;
use Meat\Sale\SaleProduct;
use Itm\Contracts\Bus\Handler;
use Meat\Repositories\SaleRepository;
use Meat\Repositories\ProductRepository;
use Meat\Repositories\SalePointRepository;

class RegisterSale implements Handler
{
    /**
     * @var \Meat\Commands\RegisterSale
     */
    protected $command;

    /**
     * @var SaleRepository
     */
    protected $repository;

    /**
     * @var SalePointRepository
     */
    protected $salePointRepository;

    /**
     * @var ProductRepository
     */
    protected $productRepository;

    /**
     * RegisterSale constructor.
     *
     * @param SaleRepository      $repository
     * @param ProductRepository   $productRepository
     * @param SalePointRepository $salePointRepository
     */
    public function __construct(
        SaleRepository $repository,
        ProductRepository $productRepository,
        SalePointRepository $salePointRepository
    )
    {
        $this->repository = $repository;
        $this->productRepository = $productRepository;
        $this->salePointRepository = $salePointRepository;
    }

    /**
     * @param \Meat\Commands\RegisterSale $command
     *
     * @return mixed|void
     */
    public function handle($command)
    {
        $this->command = $command;

        $salePoint = $this->getSalePoint();

        $sale = $salePoint->sell($this->getProducts());

        $sale->setClient($this->getClient());

        $this->repository->add($sale);
    }

    protected function getSalePoint(): SalePoint
    {
        return $this->salePointRepository->find(
            $this->command->salePoint
        );
    }

    /**
     * @return SaleProduct[]
     */
    protected function getProducts()
    {
        $products = [];

        foreach ($this->command->products as $product) {
            $saleProduct = new SaleProduct;

            $saleProduct->setProduct(
                $this->productRepository->find($product['code'])
            );

            $saleProduct->setQuantity($product['quantity']);

            $products[] = $saleProduct;
        }

        return $products;
    }

    protected function getClient(): Client
    {
        $client = new Client;

        $client->setId($this->command->client);

        return $client;
    }
}
