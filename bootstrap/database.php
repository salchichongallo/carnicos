<?php

$db = new \Illuminate\Database\Capsule\Manager;

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
