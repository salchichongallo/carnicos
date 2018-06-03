<?php

namespace App\Database\Mappers;

use stdClass;
use App\Database\Mapper;
use Meat\Store\ShopKeeper;

class ShopKeeperMapper implements Mapper
{
    public function toTable(ShopKeeper $shopKeeper)
    {
        return [
            'cedula' => $shopKeeper->getId(),
            'punto_venta_id' => $shopKeeper->getStore()->getId(),
            'usuario_id' => $shopKeeper->getUser()->getId(),
        ];
    }

    public function fromTable(stdClass $table): ShopKeeper
    {
        $shopKeeper = new ShopKeeper;

        $shopKeeper->setId($table->cedula);

        return $shopKeeper;
    }
}
