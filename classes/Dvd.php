<?php

require_once('classes/product.php');

class DVD extends Product
{
    public $size;

    public function getSize()
    {
        return $this->size;
    }

    public function setSize($size)
    {
        $this->size = $size;
    }

    public function __construct($input)
    {
        parent::__construct($input);

        $this->setSize($input['size']);
    }
}