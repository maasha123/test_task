<?php

require_once('classes/ProductsModel.php');

$title = 'Product List';

$buttons = [
    [
        'tag' => 'a',                       // Сам тег, на выбор: <button>, <a>, <input>, etc.
        'text' => 'ADD',                    // Вставляется в тег, по сути innerHTML
        // Атрибуты, создавай сколько хочешь, лишь бы подошли
        'class' => 'nav-link link-dark',
        'href' => 'addproduct.php',
    ],
    [
        'tag' => 'a',
        'text' => 'MASS DELETE',
        'class' => 'nav-link link-dark',
        'id' => 'delete-product-btn',
    ]
];

$model = new ProductsModel();
$products = $model->getProducts();
(new FrontController)->route();

?>

<?php require_once('header.php'); ?>

<div class="d-flex flex-wrap justify-content-center">
    <?php
    require_once('classes/template.php');

    foreach ($products as $product) {
        $type = strtolower(get_class($product));
        echo Template::render("card/${type}", ['product' => $product]);
    }
    ?>
</div>

<script src="js/main.js"></script>

<?php require_once('footer.php'); ?>