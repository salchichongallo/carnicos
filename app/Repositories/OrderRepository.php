<?php

namespace App\Repositories;

use Exception;
use Meat\Order\Order;
use App\Database\Table;
use App\Database\Mappers\OrderMapper;
use Meat\Repositories\ProductRepository;
use Illuminate\Database\ConnectionInterface as Connection;
use Meat\Repositories\OrderRepository as OrderRepositoryContract;

class OrderRepository implements OrderRepositoryContract
{
    /**
     * @var \Illuminate\Database\ConnectionInterface
     */
    protected $db;

    /**
     * @var \App\Database\Mappers\OrderMapper
     */
    protected $mapper;

    /**
     * @var \Meat\Repositories\ProductRepository
     */
    protected $productRepository;

    public function __construct(
        Connection $db,
        OrderMapper $mapper,
        ProductRepository $productRepository
    )
    {
        $this->db = $db;
        $this->mapper = $mapper;
        $this->productRepository = $productRepository;
    }

    public function add(Order $order): bool
    {
        $inserted = $this->db
            ->table(Table::ORDERS)
            ->insert($this->mapper->toTable(
                $order
            ));

        $this->addOrderProduct($order, $order->getProducts());

        return $inserted;
    }

    /**
     * @param \Meat\Order\Order
     * @param \Meat\Order\OrderProduct[] $orderProducts
     */
    protected function addOrderProduct($order, $orderProducts): void
    {
        foreach ($orderProducts as $orderProduct) {
            $this->db
                ->table(Table::ORDER_PRODUCTS)
                ->insert($this->mapper->orderProductToTable(
                    $order, $orderProduct
                ));
        }
    }

    public function find(string $order): Order
    {
        $result = $this->db
            ->table(Table::ORDERS)
            ->where('numero', '=', $order)
            ->first();

        if (! $result) {
            throw new Exception("Order [{$order}] not found.");
        }

        return $this->mapper->fromTable($result);
    }

    public function getProducts(Order $order)
    {
        $products = $this->db
            ->table(Table::ORDER_PRODUCTS)
            ->where('numero_pedido', '=', $order->getCode())
            ->get();

        return collect($products)->map(function ($product) {
            $orderProduct = $this->mapper->orderProductFromTable($product);

            $orderProduct->setProduct(
                $this->productRepository->find($product->codigo_producto)
            );

            return $orderProduct;
        })->toArray();
    }
}
