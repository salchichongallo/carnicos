<?php

namespace App\Database\Mappers;

use stdClass;
use Meat\Store\Store;
use App\Database\Mapper;

class StoreMapper implements Mapper
{
    public function toTable(Store $store): array
    {
        return [
            'id' => $store->getId(),
            'nombre' => $store->getName(),
            'direccion' => $store->getAddress(),
            'telefono' => $store->getPhone(),
            'ciudad_id' => $store->getCity()->getId(),
        ];
    }

    public function fromTable(stdClass $table): Store
    {
        $store = new Store;

        $store->setId($table->id);
        $store->setName($table->nombre);
        $store->setAddress($table->direccion);
        $store->setPhone($table->telefono);

        return $store;
    }
}
