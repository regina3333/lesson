<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalub=no, initial-scale=1.0,"
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dociment</title>
    <link rel="stylesheet" href="./bootstrap.min%20(1).css">
    <base href="/php-lessons-master/15/">
</head>
<body>
<div class="container">
    <h1>Товары</h1>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Название</td>
                    <td>Описание</td>
                    <td>Цена</td>
                    <td>Дата создания</td>
                    <td>Перейти</td>
                    <td>Редактировать</td>
                    <td>Удалить</td>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($product->getAll() as $product) : ?>
                    <tr>
                        <td><?= $product['id'] ?></td>
                        <td><?= $product['name'] ?></td>
                        <td><?= $product['phone'] ?></td>
                        <td><?= $product['text'] ?></td>
                        <td><?= $product['timestamp'] ?></td>
                        <td>
                            <a href="views/view/products_view.php?id=<?= $product['id'] ?>">
                                Перейти
                            </a>
                        </td>
                        <td>
                            <a href="views/edit.php?id=<?= $product['id'] ?>">
                                Редактировать
                            </a>
                        </td>
                        <td>
                            <form action="handler.php" method="POST">
                                <input
                                    type="hidden"
                                    name="id"
                                    value="<?= $product['id'] ?>"
                                >
                                <button type="submit" name="delete">Удалить</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="container">
    <h1>Отзывы</h1>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Имя</td>
                    <td>Телефон</td>
                    <td>Сообщение</td>
                    <td>Дата создания</td>
                    <td>Перейти</td>
                    <td>Редактировать</td>
                    <td>Удалить</td>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($products->getAll() as $product) : ?>
                    <tr>
                        <td><?= $review['id'] ?></td>
                        <td><?= $review['title'] ?></td>
                        <td><?= $review['description'] ?></td>
                        <td><?= $review['price'] ?></td>
                        <td><?= $review['timestamp'] ?></td>
                        <td>
                            <a href="views/view.php?id=<?= $review['id'] ?>">
                                Перейти
                            </a>
                        </td>
                        <td>
                            <a href="views/edit.php?id=<?= $review['id'] ?>">
                                Редактировать
                            </a>
                        </td>
                        <td>
                            <form action="handler.php" method="POST">
                                <input
                                    type="hidden"
                                    name="id"
                                    value="<?= $review['id'] ?>"
                                >
                                <button type="submit" name="delete">Удалить</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html><?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 03.10.2017
 * Time: 18:39
 */