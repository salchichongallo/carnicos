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

    public const SALE_POINTS = 'punto_ventas';

    public const VIEW_SHOP_KEEPER_SALE_POINTS = 'view_tenderos_punto_ventas';

    public const SHOP_KEEPERS = 'tenderos';

    public const ORDERS = 'pedidos';

    public const ORDER_PRODUCTS = 'pedidos_productos';

    public const STOCKS = 'stocks';

    public const CLIENTS = 'clientes';
}
