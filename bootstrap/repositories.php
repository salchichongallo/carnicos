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
    \Meat\Repositories\StoreRepository::class,
    \App\Repositories\StoreRepository::class
);

$app->bind(
  \Meat\Repositories\OrderRepository::class,
  \App\Repositories\OrderRepository::class
);

$app->bind(
    \Meat\Repositories\CustomerRepository::class,
    \App\Repositories\CustomerRepository::class
);

$app->bind(
    \Meat\Repositories\PromotionRepository::class,
    \App\Repositories\PromotionRepository::class
);

$app->bind(
    \Meat\Repositories\SaleProductRepository::class,
    \App\Repositories\SaleProductRepository::class
);

$app->bind(
    \Meat\Repositories\SaleRepository::class,
    \App\Repositories\SaleRepository::class
);
