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
