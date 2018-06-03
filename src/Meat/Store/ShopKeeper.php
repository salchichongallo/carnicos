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
     * @var Store
     */
    protected $store;

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
     * @return Store
     */
    public function getStore()
    {
        return $this->store;
    }

    /**
     * @param  Store $store
     *
     * @return void
     */
    public function setStore(Store $store): void
    {
        $this->store = $store;
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
