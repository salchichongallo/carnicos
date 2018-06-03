<?php

namespace Meat\Role;

class Role
{
    public const ADMIN = 'Admin';

    public const SHOP_KEEPER = 'Shop Keeper';

    public const CUSTOMER = 'Customer';

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $description;

    public static function create(string $name): self
    {
        $role = new self;

        $role->name = $name;

        return $role;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
}
