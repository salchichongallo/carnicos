<?php

namespace App\Database\Mappers;

use stdClass;
use Meat\Store\Client;
use App\Database\Mapper;

class ClientMapper implements Mapper
{
    public function toTable(Client $client): array
    {
        return [
            'id' => $client->getId(),
            'usuario_id' => $client->getUser()->getId(),
        ];
    }

    public function fromTable(stdClass $table): Client
    {
        $client = new Client;

        $client->setId($table->id);

        return $client;
    }
}
