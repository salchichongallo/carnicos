<?php

namespace Meat\Role;

class Role
{
    public const ADMIN = 'Admin';

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $description;

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
