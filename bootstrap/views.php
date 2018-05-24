<?php

use App\View\View;

$app->bind('_view', View::class);

$app->singleton(
    \Itm\Contracts\View\ViewFactory::class,
    function ($app) {
        return $app->make(\Itm\View\ViewFactory::class)
            ->register('welcome', 'welcome.php')
            ->register('404', 'errors/404.php');
    }
);
