<?php

$app->bind(
    \Meat\Repositories\PresentationRepository::class,
    \App\Repositories\PresentationRepository::class
);

$app->bind(
    \Meat\Repositories\ProductRepository::class,
    \App\Repositories\ProductRepository::class
);

$app->bind(
    \Meat\Repositories\CityRepository::class,
    \App\Repositories\CityRepository::class
);

$app->bind(
    \Meat\Repositories\NeighborhoodRepository::class,
    \App\Repositories\NeighborhoodRepository::class
);

$app->bind(
    \Meat\Repositories\RoleRepository::class,
    \App\Repositories\RoleRepository::class
);

$app->bind(
    \Meat\Repositories\UserRepository::class,
    \App\Repositories\UserRepository::class
);

$app->bind(
    \Meat\Repositories\ShopKeeperRepository::class,
    \App\Repositories\ShopKeeperRepository::class
);

$app->bind(
    \Meat\Repositories\SalePointRepository::class,
    \App\Repositories\SalePointRepository::class
);
