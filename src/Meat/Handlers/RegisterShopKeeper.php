<?php

namespace Meat\Handlers;

use Meat\User;
use Meat\Role\Role;
use Meat\Commands\CreateUser;
use Itm\Contracts\Bus\Handler;
use Meat\Store\{ShopKeeper, SalePoint};
use Meat\Repositories\ShopKeeperRepository;

class RegisterShopKeeper implements Handler
{
    /**
     * @var ShopKeeperRepository
     */
    protected $repository;

    public function __construct(ShopKeeperRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @var \Meat\Commands\RegisterShopKeeper $command
     */
    public function handle($command)
    {
        $shopKeeper = $this->createShopKeeper($command);

        $this->assignUser($shopKeeper, $command);

        $this->assignSalePoint($shopKeeper, $command);

        $this->repository->add($shopKeeper);
    }

    /**
     * @param  \Meat\Commands\RegisterShopKeeper $command
     * @return ShopKeeper
     */
    protected function createShopKeeper($command): ShopKeeper
    {
        $shopKeeper = new ShopKeeper;

        $shopKeeper->setId($command->nit);

        return $shopKeeper;
    }

    /**
     * @param  ShopKeeper $shopKeeper
     * @param  \Meat\Commands\RegisterShopKeeper $command
     * @return void
     */
    protected function assignSalePoint($shopKeeper, $command): void
    {
        $salePoint = new SalePoint;

        $salePoint->setId($command->salePointId);

        $shopKeeper->setSalePoint($salePoint);
    }

    /**
     * @param  ShopKeeper $shopKeeper
     * @param  \Meat\Commands\RegisterShopKeeper $command
     * @return void
     */
    protected function assignUser($shopKeeper, $command): void
    {
        $shopKeeper->setUser(
            $this->createUserForShopKeeper($command)
        );
    }

    /**
     * @param  \Meat\Commands\RegisterShopKeeper $command
     * @return User
     */
    protected function createUserForShopKeeper($command): User
    {
        $createUser = new CreateUser;

        $createUser->name = $command->name;
        $createUser->email = $command->email;
        $createUser->password = $command->password;
        $createUser->address = $command->address;
        $createUser->phone = $command->phone;
        $createUser->neighborhoodId = $command->neighborhoodId;

        $createUser->role = Role::SHOP_KEEPER;

        return dispatch($createUser);
    }
}
