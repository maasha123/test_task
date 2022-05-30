<?php

require_once('classes/product.php');
require_once('classes/book.php');
require_once('classes/dvd.php');
require_once('classes/furniture.php');

class ProductsModel
{
     private function __construct()
        {
        }
        public static function getInstance()
        {
            static $instance;
            if (!isset($instance)) $instance = new self;
            return $instance;
        }
        
    private $dbConnection;
    private function getDBConnection()
    {
        return $this->dbConnection;
    }

    public function __construct()
    {
        require_once('config.php');
        $this->getDBConnection() = new mysqli('localhost', 'root', $password, 'shop');
    }

    public function isValid($sku)
    {
        $sql = "SELECT * FROM products WHERE sku = '$sku'";
        $result = $this->getDBConnection()->query($sql);
        if ($result->num_rows > 0) {
            return true;
        }
        return false;
    }

    public function getProducts($orderBy = 'sku')
    {
        $products = [];
        $result = $this->getDBConnection()->query("SELECT * FROM products ORDER BY $orderBy");
        while ($row = $result->fetch_assoc()) {
            $class = $row['type'];
            $product = new $class($row);
            $products[] = $product;
        }
        return $products;
    }

    public function getProduct($sku)
    {
        $result = $this->getDBConnection()->query("SELECT * FROM products WHERE sku = '$sku'");
        $row = $result->fetch_assoc();
        $class = $row['type'];
        return new $class($row);
    }

    public function getTypes()
    {
        $types = [];
        $result = $this->dbConnection->query("SELECT distinct(type) FROM products");
        while ($row = $result->fetch_assoc())
            $types[] = $row['type'];
        return $types;
    }

    public function addProduct($product)
    {
      
        $type = get_class($product);
    
        $parameters = ['sku', 'name','price', 'weight', 'size', 'length', 'width', 'height'];
        foreach ($parameters as $param)
         {
            if (method_exists($product, $method = "get{$param}"))
            {
                ${$param} = $product->$method();
                } else {
               ${$param} = 'NULL';
                }            }
        }


        $query = "INSERT INTO products (sku, name, price, type, weight, size, length, width, height) 
                 VALUES ('$sku', '$name', $price, '$type', $weight, $size, $length, $width, $height)";
        return  $this->getDBConnection()->query($query);
        
    }

    public function deleteProduct($sku)
    {
        $sku = "'" . implode("','", $sku) . "'";
        $query("DELETE * FROM products WHERE sku IN({$sku});
        $this->getDBConnection()->query($query);
    }
}