<?php

namespace Meat\Handlers;

use Meat\Store\Store;
use Meat\Store\Customer;
use Meat\Sale\SaleProduct;
use Itm\Contracts\Bus\Handler;
use Meat\Repositories\SaleRepository;
use Meat\Repositories\StoreRepository;
use Meat\Repositories\ProductRepository;

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
     * @var StoreRepository
     */
    protected $storeRepository;

    /**
     * @var ProductRepository
     */
    protected $productRepository;

    /**
     * RegisterSale constructor.
     *
     * @param SaleRepository    $repository
     * @param StoreRepository   $storeRepository
     * @param ProductRepository $productRepository
     */
    public function __construct(
        SaleRepository $repository,
        StoreRepository $storeRepository,
        ProductRepository $productRepository
    )
    {
        $this->repository = $repository;
        $this->productRepository = $productRepository;
        $this->storeRepository = $storeRepository;
    }

    /**
     * @param \Meat\Commands\RegisterSale $command
     *
     * @return mixed|void
     */
    public function handle($command)
    {
        $this->command = $command;

        $store = $this->getStore();

        $sale = $store->sell($this->getProducts());

        $sale->setCustomer($this->getCustomer());

        $this->repository->add($sale);
    }

    protected function getStore(): Store
    {
        return $this->storeRepository->find(
            $this->command->store
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

    protected function getCustomer(): Customer
    {
        $customer = new Customer;

        $customer->setId($this->command->customer);

        return $customer;
    }
}
