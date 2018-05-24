<?php

$app->bind(
    \Meat\Repositories\PresentationRepository::class,
    \App\Repositories\PresentationRepository::class
);

$app->bind(
    \Meat\Repositories\ProductRepository::class,
    \App\Repositories\ProductRepository::class
);
