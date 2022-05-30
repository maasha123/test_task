<?php

class Product
{
    private $sku;
    private $name;
    private $price;

    public function getSKU()
    {
        return $this->sku;
    }

    protected function setSKU($sku)
    {
        $this->sku = $sku;
    }

    public function getName()
    {
        return $this->name;
    }

    protected function setName($name)
    {
        $this->name = $name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    protected function setPrice($price)
    {
        $this->price = $price;
    }

    public function __construct($input)
    {
        $this->setSku($input['sku']);
        $this->setName($input['name']);
        $this->setPrice($input['price']);
    }
}