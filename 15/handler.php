<?php
spl_autoload_register();
spl_autoload_register();

if (isset($_POST['edit'])) {
    $products = new \Models\Product();
    $data = [
        'title' => $_POST['title'],
        'description' => $_POST['description'],
        'price' => $_POST['price'],
    ];
    $products->update($_POST['id'], $data);
    header('Location: index.php');
}
if (isset($_POST ['delete'])){
    $products = new \Models\Product();
    $products->delete($_POST['id']);
    header('Location: index.php');
}