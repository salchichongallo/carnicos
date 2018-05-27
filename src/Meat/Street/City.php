<?php

namespace Meat\Street;

class City
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    protected $totalVisits = 0;

    public function incrementVisits(int $amount = 1)
    {
        $this->totalVisits += $amount;
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
     * @return int
     */
    public function getTotalVisits()
    {
        return $this->totalVisits;
    }

    /**
     * @param int $totalVisits
     */
    public function setTotalVisits(int $totalVisits): void
    {
        $this->totalVisits = $totalVisits;
    }
}
