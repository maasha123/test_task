<?php

require_once('classes/product.php');

class Book extends Product
{
    public $weight;

    public function getWeight()
    {
        return $this->weight;
    }

    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    public function __construct($input)
    {
        parent::__construct($input);

        $this->setWeight($input['weight']);
    }
}