<?php

namespace App\Database;

abstract class Table
{
    public const PRODUCTS = 'productos';

    public const PRESENTATIONS = 'presentaciones';

    public const CITIES = 'ciudades';

    public const VISITS = 'visitas';

    public const NEIGHBORHOODS = 'barrios';

    public const USERS = 'usuarios';

    public const ROLES = 'roles';

    public const STORES = 'punto_ventas';

    public const VIEW_SHOP_KEEPER_STORES = 'view_tenderos_punto_ventas';

    public const SHOP_KEEPERS = 'tenderos';

    public const ORDERS = 'pedidos';

    public const ORDER_PRODUCTS = 'pedidos_productos';

    public const STOCKS = 'stocks';

    public const CUSTOMERS = 'clientes';

    public const PROMOTIONS = 'promociones';

    public const SALES = 'ventas';

    public const SALE_PRODUCTS = 'ventas_productos';
}
