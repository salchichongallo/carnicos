<?php

$app->singleton(
    \Itm\Contracts\Hashing\Hasher::class,
    \Itm\Hashing\BcryptHasher::class
);

$app->singleton(
    \Meat\Contracts\Auth\AuthService::class,
    \Meat\Auth\AuthService::class
);

$app->singleton(
    \Itm\Contracts\Bus\Bus::class,
    function ($app) {
        /** @var \Itm\Bus\Bus $bus */
        $bus = $app->make(\Itm\Bus\Bus::class);

        $bus->map(
            \Meat\Commands\RegisterVisit::class,
            \Meat\Handlers\RegisterVisit::class
        );

        $bus->map(
            \Meat\Commands\CountLogin::class,
            \Meat\Handlers\CountLogin::class
        );

        $bus->map(
            \Meat\Commands\UpdateLastVisitUser::class,
            \Meat\Handlers\UpdateLastVisitUser::class
        );

        $bus->map(
            \Meat\Commands\RegisterLogin::class,
            \Meat\Handlers\RegisterLogin::class
        );

        $bus->map(
            \Meat\Commands\CreateSalePoint::class,
            \Meat\Handlers\CreateSalePoint::class
        );

        $bus->map(
            \Meat\Commands\CreateUser::class,
            \Meat\Handlers\CreateUser::class
        );

        $bus->map(
            \Meat\Commands\RegisterShopKeeper::class,
            \Meat\Handlers\RegisterShopKeeper::class
        );

        $bus->map(
            \Meat\Commands\CreateProduct::class,
            \Meat\Handlers\CreateProduct::class
        );

        $bus->map(
            \Meat\Commands\MakeOrder::class,
            \Meat\Handlers\MakeOrder::class
        );

        $bus->map(
            \Meat\Commands\ReceiveOrder::class,
            \Meat\Handlers\ReceiveOrder::class
        );

        $bus->map(
            \Meat\Commands\RegisterClient::class,
            \Meat\Handlers\RegisterClient::class
        );

        $bus->map(
            \Meat\Commands\CreatePromotion::class,
            \Meat\Handlers\CreatePromotion::class
        );

        return $bus;
    }
);
