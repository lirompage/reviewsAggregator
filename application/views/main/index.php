<?php

use application\controllers\MainController;
use application\helpers\SortHelper;
$sort = SortHelper::sort();

?>
<div class="container">
    <h1>Каталог товаров</h1>
    <table>
        <thead>
            <tr>
                <td><a href="/?product_sort=<?=  isset($sort)?$sort:'DESC';  ?>">Название товара</a></td>
                <td>Изображение</td>
                <td><a href="/?date_sort=<?=  isset($sort)?$sort:'DESC';  ?>">Дата добавления</a></td>
                <td><a href="/?user_sort=<?=  isset($sort)?$sort:'DESC';  ?>">Пользователь</a></td>
                <td><a href="/?review_sort=<?=  isset($sort)?$sort:'DESC';  ?>">Кол-во отзывов</a></td>
            </tr>
        </thead>
        <tbody>
        <?php
        /** @var $products array */
        foreach ($products as $product): ?>
            <tr>
                <td><a href="<?= "/product?product=". $product['id']?>"><?= $product['product_name'] ?></a></td>
                <td><img class="small-img" src="<?= $product['img'] ?>" alt=""></td>
                <td>
                    <?php
                        $date = new DateTime($product['created_at']);
                        echo $date->format('d-m-Y H:i');
                    ?>
                </td>
                <td><?= $product['user_name'] ?></td>
                <td><?= MainController::countReviews($product['id']); ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <a class="button" href="/add-product">Добавить товар</a>
</div>
