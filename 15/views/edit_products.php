<?php

spl_autoload_register();
// Срабатывает если задан параметр id(элемента)
if (isset($_REQUEST['id'])) {
    $product = new \Models\Product();
    $product = $product->getOne($_REQUEST ['id']);
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
    <title>Document</title>
    <base href="/php-lessons-master/15/"
</head>
<body>
<form action="../handler.php" method="post">
<div class="form-group">
    <label for="title">Название</label>
    <input type="text" class="form-control" name="title" id="title" value="<?= $product['title'] ?>">
</div>
<div class="form-group">
    <label for="description">Описание</label>
    <input type="text" class="form-control" name="description" value="<?= $product['description'] ?>">
</div>
<div class="form-group">
    <label for="price">Цена</label>
    <input type="text" class="form-control" name="price" value="<?= $product['price'] ?>">
</div>
<input type="hidden" name="id" value="<?= $_REQUEST['id'] ?>">
<button type="submit" name="edit">Отредактировать</button>
</form>
</body>
<html>


