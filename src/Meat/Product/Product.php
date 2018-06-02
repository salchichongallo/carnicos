<?php

namespace Meat\Product;

use JsonSerializable;

class Product implements JsonSerializable
{
    /**
     * @var string
     */
    protected $code;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var float
     */
    protected $price = 0;

    /**
     * @var Presentation
     */
    protected $presentation;

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
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
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @return Presentation
     */
    public function getPresentation()
    {
        return $this->presentation;
    }

    /**
     * @param Presentation $presentation
     */
    public function setPresentation(Presentation $presentation): void
    {
        $this->presentation = $presentation;
    }

    public function toArray()
    {
        return [
            'code' => $this->code,
            'name' => $this->name,
            'unitValue' => $this->price,
            'presentation' => $this->getPresentation()->getId(),
        ];
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }

    public function toJson($options = 0)
    {
        return json_encode($this->jsonSerialize(), $options);
    }
}
