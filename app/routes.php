<?php

use App\Http\Controllers\{
    AdminController,
    WelcomeController,
    PromotionController,
    Auth\LoginController,
    Auth\RegisterController
};

$router = app('router');

$router->get('init', AdminController::class)->initApp();

$router->get('bienvenido', WelcomeController::class)->showWelcome();
$router->post('bienvenido', WelcomeController::class)->changeCity();

$router->get('login', LoginController::class)->showLogin();
$router->post('login', LoginController::class)->login();
$router->post('logout', LoginController::class)->logout();

$router->get('registro', RegisterController::class)->showRegister();
$router->post('registro', RegisterController::class)->register();

$router->get('promociones', PromotionController::class)->showPromotions();

$router->get('404', WelcomeController::class)->showNotFound();
$router->post('404', WelcomeController::class)->showNotFound();
