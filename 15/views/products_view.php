<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 21.09.2017
 * Time: 19:05
 */

namespace Models;


class Product extends \Database
{
    public $table = "products";
    public $allowed=['title' ,'description', 'price'];
}
// Срабатывает если задан параметр id(элемента)
if (isset($_REQUEST['id'])){
    $reviews = new \Models\Review();
    $review = $reviews->getOne($_REQUEST['id']);
} else {
    echo 'Не указан id';
    die();
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Карточка товара</title>
</head>
<body>
<h1><?= $reviews['id'] ?></h1>
<h2><?= $reviews['name'] ?></h2>
<h3><?= $reviews['phone'] ?></h3>
<h4><?= $reviews['text'] ?></h4>
<h5><?= $reviews['timestamp'] ?></h5>
</body>
</html>