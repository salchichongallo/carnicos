<?php

namespace App\Database\Mappers;

use stdClass;
use DateTime;
use Meat\Order\Order;
use App\Database\Mapper;
use Meat\Store\SalePoint;
use Meat\Order\OrderProduct;

class OrderMapper implements Mapper
{
    public function toTable(Order $order)
    {
        return [
            'numero' => $order->getCode(),
            'fecha' => $order->getDate(),
            'estado' => $order->getState(),
            'punto_venta_id' => $order->getSalePoint()->getId(),
        ];
    }

    public function fromTable(stdClass $table): Order
    {
        $order = new Order;

        $order->setCode($table->numero);
        $order->setState($table->estado);

        $date = new DateTime;
        $date->setTimestamp(strtotime($table->fecha));
        $order->setDate($date);

        $salePoint = new SalePoint;
        $salePoint->setId($table->punto_venta_id);

        $order->setSalePoint($salePoint);

        return $order;
    }

    /**
     * @param Order $order
     * @param \Meat\Order\OrderProduct $orderProduct
     *
     * @return array
     */
    public function orderProductToTable($order, $orderProduct)
    {
        return [
            'numero_pedido' => $order->getCode(),
            'codigo_producto' => $orderProduct->getProduct()->getCode(),
            'cantidad' => $orderProduct->getQuantity(),
            'total' => $orderProduct->total(),
        ];
    }

    public function orderProductFromTable(stdClass $table): OrderProduct
    {
        $orderProduct = new OrderProduct;

        $orderProduct->setQuantity($table->cantidad);

        return $orderProduct;
    }
}
