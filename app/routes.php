<?php

use App\Http\Controllers\{
    SaleController,
    AdminController,
    OrderController,
    CustomerController,
    WelcomeController,
    PromotionController,
    StoreController,
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

$router->get('nueva_tienda', StoreController::class)->showCreationForm();
$router->post('crear_nueva_tienda', StoreController::class)->create();

$router->get('promociones', PromotionController::class)->showPromotions();

$router->get('realizar_pedido', OrderController::class)->showForm();
$router->post('nuevo_pedido', OrderController::class)->makeOrder();

$router->get('registrar_cliente', CustomerController::class)->showRegisterForm();
$router->post('nuevo_cliente', CustomerController::class)->create();

$router->get('registrar_venta', SaleController::class)->showNewSaleForm();
$router->post('nueva_venta', SaleController::class)->registerSale();

$router->get('404', WelcomeController::class)->showNotFound();
$router->post('404', WelcomeController::class)->showNotFound();

$router->get('403', WelcomeController::class)->showForbidden();
$router->post('403', WelcomeController::class)->showForbidden();
