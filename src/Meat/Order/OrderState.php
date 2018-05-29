<?php

namespace Meat\Order;

abstract class OrderState
{
    public const PENDING = 'pendiente';

    public const DELIVERED = 'entregado';

    public static function isPending($state): bool
    {
        return self::PENDING === $state;
    }

    public static function isDelivered($state): bool
    {
        return self::DELIVERED === $state;
    }
}
