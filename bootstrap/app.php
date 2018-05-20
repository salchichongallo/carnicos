<?php

$app = new \Illuminate\Container\Container;

$app->instance(
    \Illuminate\Contracts\Container\Container::class,
    $app
);

$db = new Illuminate\Database\Capsule\Manager;
$db->addConnection([
    'driver'    => 'mysql',
    'host'      => '127.0.0.1',
    'database'  => 'carnicos',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);
$app->instance(
    \Illuminate\Database\ConnectionInterface::class,
    $db->getConnection('default')
);

$app->bind(
    \Meat\Repositories\PresentationRepository::class,
    \App\Repositories\PresentationRepository::class
);

$app->bind(
    \Meat\Repositories\ProductRepository::class,
    \App\Repositories\ProductRepository::class
);

return $app;
