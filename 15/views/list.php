
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/15/css/bootstrap.min.css">
    <base href="/15/">
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
                <?php foreach ($products as $product) : ?>
    <tr>
        <td><?= $product['id'] ?></td>
        <td><?= $product['title'] ?></td>
        <td><?= $product['description'] ?></td>
        <td><?= $product['price'] ?></td>
        <td><?= $product['timestamp'] ?></td>
        <td>
            <a href="views/products_view.php?id=<?= $product['id'] ?>">
                Перейти
            </a>
        </td>
        <td>
            <a href="views/products_edit.php?id=<?= $product['id'] ?>">
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
            <?php foreach ($reviews as $review) : ?>
                <tr>
                    <td><?= $review['id'] ?></td>
                    <td><?= $review['name'] ?></td>
                    <td><?= $review['phone'] ?></td>
                    <td><?= $review['text'] ?></td>
                    <td><?= $review['timestamp'] ?></td>
                    <td>
                        <a href="views/reviews_view.php?id=<?= $review['id'] ?>">
                            Перейти
                        </a>
                    </td>
                    <td>
                        <a href="views/reviews_edit.php?id=<?= $review['id'] ?>">
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
</html>/