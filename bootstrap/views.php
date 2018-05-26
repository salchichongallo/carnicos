<?php

use App\View\View;

$app->bind('_view', View::class);

$app->singleton(
    \Itm\Contracts\View\ViewFactory::class,
    function ($app) {
        return $app->make(\Itm\View\ViewFactory::class)
            ->register('head', 'partials/head.php')
            ->register('header', 'partials/header.php')
            ->register('nav', 'partials/nav.php')
            ->register('footer', 'partials/footer.php')
            ->register('message', 'partials/message.php')
            ->register('welcome', 'welcome.php')
            ->register('login', 'auth/login.php')
            ->register('register', 'auth/register.php')
            ->register('promotions', 'promotions.php')
            ->register('404', 'errors/404.php');
    }
);
