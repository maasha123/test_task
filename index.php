<?php

class Product
 {
        private $sku;
        private $name;
        private $price;
        protected function getSku()
        {
            return $this->sku;
        }
        protected function setSku($sku)
        {
            $this->sku = $sku;
        }
        protected function getName()
        {
            return $this->name;
        }
        protected function setName($name)
        {
            $this->name = $name;
        }
        protected function getPrice()
        {
            return $this->price;
        }
        protected function setPrice($price)
        {
            $this->price = $price;
        }
        public function __construct($array)
        {
            $this->setSku($array['sku']);
            $this->setName($array['name']);
            $this->setPrice($array['price']);
        }
    }
   
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
       
        public function __construct($array)
        {
            parent :: __construct($array);
           
            $this->setSize($array['size']);
        }

       $array = [
       'sku' => 'ALP',
       'name' => 'hjkl',
       'price' => 80,
       'size' => 1,
       ];

       $b = new DVD($array);
       echo $b->getSize();
    }

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
        public function __construct($array)
        {
        	parent :: __construct($array);
          
            $this->setWeight($array['weight']);
        }
        $array = [
       'sku' => 'AdfghP',
       'name' => 'master and margarita',
       'price' => 20,
       'weight' => 3,
       ];

       $c = new Book($array);
             echo $c->getWeight();
    }


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
        public function __construct($array)
        {
        	parent :: __construct($array);
           
            $this->setHeight($array['height']);
            $this->setWidth($array['width']);
            $this->setLength($array['length']);
        }
      $array = [
       'sku' => 'Adfggjknm,hP',
       'name' => 'phurniture123',
       'price' => 156,
       'height' => 3,
       'width'=> 150,
       'length' => 56,
       ];

       $j = new Furniture($array);
      
       echo $j->getLength();
        
    }
?>


