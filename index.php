<?php
require_once('classes/productsModel.php');
require_once('classes/book.php');
require_once('classes/dvd.php');
require_once('classes/furniture.php');
$model = new ProductsModel();
$title = "Overview";

if (isset($_POST['add'])) {
    $title = "Product addition";
    echo var_dump($_POST);
    echo "<br>";

    switch ($_POST['type']) {
        case 'Book':
            $product = new Book($_POST);
            break;

        case 'DVD':
            $product = new DVD($_POST);
            break;

        case 'Furniture':
            $product = new Furniture($_POST);
            break;
    }

    $model->addProduct($product);
}

if (isset($_POST['delete'])) {
    $title = "Product deleting";
    echo var_dump($_POST);
    echo "<br>";

    $model->deleteProduct($_POST['sku']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
</head>

<body>

    <!-- <a href="classes/tracer.php">Tracer example</a> -->

    <!-- Form for new value-->
    <h2>Add Book</h2>
    <form method="post">
        <input type="text" name="add" hidden>
        <input type="text" name="type" value="Book" hidden>
        <input type="text" name="sku" placeholder="Артикул">
        <input type="text" name="name" placeholder="Название">
        <input type="text" name="price" placeholder="Цена">
        <input type="text" name="weight" placeholder="Вес">
        <input type="submit" value="Добавить">
    </form>

    <!-- Form for new DVD-->
    <h2>Add DVD</h2>
    <form method="post">
        <input type="text" name="add" hidden>
        <input type="text" name="type" value="DVD" hidden>
        <input type="text" name="sku" placeholder="Артикул">
        <input type="text" name="name" placeholder="Название">
        <input type="text" name="price" placeholder="Цена">
        <input type="text" name="size" placeholder="Размер">
        <input type="submit" value="Добавить">
    </form>

    <!-- Form for new furniture-->
    <h2>Add furniture</h2>
    <form method="post">
        <input type="text" name="add" hidden>
        <input type="text" name="type" value="Furniture" hidden>
        <input type="text" name="sku" placeholder="Артикул">
        <input type="text" name="name" placeholder="Название">
        <input type="text" name="price" placeholder="Цена">
        <input type="text" name="length" placeholder="Длина">
        <input type="text" name="width" placeholder="Ширина">
        <input type="text" name="height" placeholder="Высота">
        <input type="submit" value="Добавить">
    </form>

    <!-- Delete product by SKU form-->
    <h2>Delete product by SKU</h2>
    <form method="post">
        <input type="text" name="delete" hidden>
        <input type="text" name="sku" placeholder="Артикул">
        <input type="submit" value="Удалить">
    </form>

    <!-- Table with products -->
    <h2>All products</h2>
    <table>
        <thead>
            <tr>
                <th>Артикул</th>
                <th>Название</th>
                <th>Цена</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $products = $model->getProducts();
            foreach ($products as $product) {
                echo '<tr>';
                echo '<td>' . $product->getSKU() . '</td>';
                echo '<td>' . $product->getName() . '</td>';
                echo '<td>' . $product->getPrice() . '</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</body>

</html>