<?php
spl_autoload_register();

$products = new \Models\Product();
$reviews = new \Models\Review();

$router = new Router($products,$reviews);
$router->execute();

?>