<?php

namespace Meat;

use DateTime;
use Meat\Role\Role;
use Meat\Street\Neighborhood;

class User
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $password;

    /**
     * @var string
     */
    protected $address;

    /**
     * @var string
     */
    protected $phone;

    /**
     * @var int
     */
    protected $totalLogin = 0;

    /**
     * @var DateTime
     */
    protected $lastVisit;

    /**
     * @var Role
     */
    protected $role;

    /**
     * @var Neighborhood
     */
    protected $neighborhood;

    public function incrementLogins(int $amount = 1)
    {
        $this->totalLogin += $amount;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return int
     */
    public function getTotalLogin()
    {
        return $this->totalLogin;
    }

    /**
     * @param int $totalLogin
     */
    public function setTotalLogin(int $totalLogin): void
    {
        $this->totalLogin = $totalLogin;
    }

    /**
     * @return DateTime
     */
    public function getLastVisit()
    {
        return $this->lastVisit;
    }

    /**
     * @param DateTime $lastVisit
     */
    public function setLastVisit(DateTime $lastVisit): void
    {
        $this->lastVisit = $lastVisit;
    }

    /**
     * @return Role
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param Role $role
     */
    public function setRole(Role $role): void
    {
        $this->role = $role;
    }

    /**
     * @return Neighborhood
     */
    public function getNeighborhood()
    {
        return $this->neighborhood;
    }

    /**
     * @param Neighborhood $neighborhood
     */
    public function setNeighborhood(Neighborhood $neighborhood): void
    {
        $this->neighborhood = $neighborhood;
    }
}
