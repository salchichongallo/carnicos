<?php

namespace App\Repositories;

use App\Database\Table;
use Meat\Store\ShopKeeper;
use App\Database\Mappers\ShopKeeperMapper;
use Illuminate\Contracts\Container\Container;
use Illuminate\Database\ConnectionInterface as Connection;
use Meat\Repositories\ShopKeeperRepository as ShopKeeperRepositoryContract;

class ShopKeeperRepository implements ShopKeeperRepositoryContract
{
    /**
     * @var Connection
     */
    protected $db;

    /**
     * @var ShopKeeperMapper
     */
    protected $mapper;

    public function __construct(Connection $db, ShopKeeperMapper $mapper)
    {
        $this->db = $db;
        $this->mapper = $mapper;
    }

    public function add(ShopKeeper $shopKeeper): bool
    {
        return $this->db->table(Table::SHOP_KEEPERS)
            ->insert($this->mapper->toTable(
                $shopKeeper
            ));
    }
}
