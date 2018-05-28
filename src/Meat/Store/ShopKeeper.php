<?php

namespace Meat\Store;

use Meat\User;

class ShopKeeper
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var SalePoint
     */
    protected $salePoint;

    /**
     * @var User
     */
    protected $user;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  string $id
     * @return void
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return SalePoint
     */
    public function getSalePoint()
    {
        return $this->salePoint;
    }

    /**
     * @param  SalePoint $salePoint
     * @return void
     */
    public function setSalePoint(SalePoint $salePoint): void
    {
        $this->salePoint = $salePoint;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param  User $user
     * @return void
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
    }
}
