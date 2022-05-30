<?php

require_once('classes/product.php');

class Furniture extends Product
{
    public $length;
    public $width;
    public $height;

    public function getHeight()
    {
        return $this->height;
    }

    public function setHeight($height)
    {
        $this->height = $height;
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function setWidth($width)
    {
        $this->width = $width;
    }

    public function getLength()
    {
        return $this->length;
    }

    public function setLength($length)
    {
        $this->length = $length;
    }

    public function __construct($input)
    {
        parent::__construct($input);

        $this->setHeight($input['height']);
        $this->setWidth($input['width']);
        $this->setLength($input['length']);
    }
}