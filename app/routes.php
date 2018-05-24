<?php

use App\Http\Controllers\{
    WelcomeController
};

$router->get('welcome', WelcomeController::class)->showWelcome();

$router->get('404', WelcomeController::class)->showNotFound();
$router->post('404', WelcomeController::class)->showNotFound();
