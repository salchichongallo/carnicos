<?php

$db = new \Illuminate\Database\Capsule\Manager;

$db->addConnection([
    'driver'    => env('DB_CONNECTION', 'mysql'),
    'host'      => env('DB_HOST', '127.0.0.1'),
    'database'  => env('DB_DATABASE', 'carnicos'),
    'username'  => env('DB_USERNAME', 'root'),
    'password'  => env('DB_PASSWORD', ''),
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

$app->instance(
    \Illuminate\Database\ConnectionInterface::class,
    $db->getConnection('default')
);
