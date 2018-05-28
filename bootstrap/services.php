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

        return $bus;
    }
);
