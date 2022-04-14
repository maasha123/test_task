<?php

require_once('product.php');

class ProductsModel
{
    private $dbConnection;

    public function getDBConnection()
    {
        return $this->dbConnection;
    }

    public function __construct()
    {
        require_once('config.php');
        $this->dbConnection = $connection;
    }

    public function getProducts()
    {
        $products = [];
        $result = $this->dbConnection->query('SELECT * FROM products');
        while ($row = $result->fetch_assoc()) {
            $product = new Product($row);
            $products[] = $product;
        }
        return $products;
    }

    public function addProduct($product)
    {
        $sku = $product->getSku();
        $name = $product->getName();
        $price = $product->getPrice();
        $type = get_class($product);
        $weight = 'NULL';
        $size = 'NULL';
        $length = 'NULL';
        $width = 'NULL';
        $height = 'NULL';

        if (method_exists($product, "getWeight"))
            $weight = "'" . $product->getWeight() . "'";

        if (method_exists($product, "getSize"))
            $size = "'" . $product->getSize() . "'";

        if (method_exists($product, "getLength"))
            $length = "'" . $product->getLength() . "'";

        if (method_exists($product, "getWidth"))
            $width = "'" . $product->getWidth() . "'";

        if (method_exists($product, "getHeight"))
            $height = "'" . $product->getHeight() . "'";


        $query = "INSERT INTO products (sku, name, price, type, weight, size, length, width, height) VALUES ('$sku', '$name', '$price', '$type', $weight, $size, $length, $width, $height)";
        echo $query;
        echo "<br>";
        $result = $this->dbConnection->query($query);
        return $result;
    }

    public function deleteProduct($sku)
    {
        $result = $this->dbConnection->query("DELETE FROM products WHERE sku = '$sku'");
        return $result;
    }
}