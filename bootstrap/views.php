<?php

use App\View\View;

$app->bind('_view', View::class);

$app->singleton(
    \Itm\Contracts\View\ViewFactory::class,
    function ($app) {
        return $app->make(\Itm\View\ViewFactory::class)
            ->register('head', 'partials/head.php')
            ->register('header', 'partials/header.php')
            ->register('sidebar', 'partials/sidebar.php')
            ->register('footer', 'partials/footer.php')
            ->register('message', 'partials/message.php')
            ->register('product', 'partials/product.php')

            ->register('welcome', 'welcome.php')

            ->register('login', 'auth/login.php')
            ->register('register', 'auth/register.php')

            ->register('stores.create', 'stores/create.php')

            ->register('promotions.show', 'promotions/show.php')

            ->register('orders.create', 'orders/create.php')

            ->register('customers.create', 'customers/create.php')

            ->register('sales.register', 'sales/register.php')

            ->register('404', 'errors/404.php')
            ->register('403', 'errors/403.php');
    }
);
