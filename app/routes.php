<?php

use App\Http\Controllers\{
    SaleController,
    AdminController,
    OrderController,
    ClientController,
    WelcomeController,
    PromotionController,
    SalePointController,
    Auth\LoginController,
    Auth\RegisterController
};

$router = app('router');

$router->get('init', AdminController::class)->initApp();

$router->get('bienvenido', WelcomeController::class)->showWelcome();
$router->post('cambiar_ciudad', WelcomeController::class)->changeCity();

$router->get('login', LoginController::class)->showLogin();
$router->post('login', LoginController::class)->login();
$router->post('logout', LoginController::class)->logout();

$router->get('registro', RegisterController::class)->showRegister();
$router->post('nuevo_registro', RegisterController::class)->register();

$router->get('nueva_tienda', SalePointController::class)->showCreationForm();
$router->post('crear_nueva_tienda', SalePointController::class)->create();

$router->get('promociones', PromotionController::class)->showPromotions();

$router->get('realizar_pedido', OrderController::class)->showForm();
$router->post('nuevo_pedido', OrderController::class)->makeOrder();

$router->get('registrar_cliente', ClientController::class)->showRegisterForm();
$router->post('nuevo_cliente', ClientController::class)->create();

$router->get('registrar_venta', SaleController::class)->showNewSaleForm();
$router->post('nueva_venta', SaleController::class)->registerSale();

$router->get('404', WelcomeController::class)->showNotFound();
$router->post('404', WelcomeController::class)->showNotFound();
