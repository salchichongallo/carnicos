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

            ->register('survey.step1', 'survey/steps/step1.php')
            ->register('survey.step2', 'survey/steps/step2.php')
            ->register('survey.step3', 'survey/steps/step3.php')
            ->register('survey.step4', 'survey/steps/step4.php')
            ->register('survey.step5', 'survey/steps/step5.php')
            ->register('survey.step6', 'survey/steps/step6.php')
            ->register('survey.step7', 'survey/steps/step7.php')
            ->register('survey.step8', 'survey/steps/step8.php')
            ->register('survey.thanks', 'survey/thanks.php')
            ->register('survey.survey_made', 'survey/survey_made.php')

            ->register('404', 'errors/404.php')
            ->register('403', 'errors/403.php');
    }
);
