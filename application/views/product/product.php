<?php
/** @var $product array */
/** @var $reviews array */
/** @var $overallRating int */

?>
<div class="container">
    <h1><?= $product['product_name'] ?></h1>

    <div class="w50">
        <img src="<?= $product['img'] ?>" alt="">
    </div>
    <div class="w50">
        <h3>Рейтинг: <span class="rating"><?= $overallRating ?></span></h3>
        <table>
            <table>
                <thead>
                <tr>
                    <td>Имя</td>
                    <td>Оценка</td>
                    <td>Коментарий</td>
                    <td>Дата добавления</td>
                </tr>
                </thead>
                <tbody>
                    <?php if(empty($reviews)):?>
                    <tr>
                        <td class="center" colspan="4">Нет отзывов</td>
                    </tr>
                    <?php endif; ?>
                    <?php foreach($reviews as $review) :?>
                    <tr>
                        <td><?= $review['user_id_fk'] ?></td>
                        <td><?= $review['rating'] ?></td>
                        <td><?= $review['comment'] ?></td>
                        <td>
                            <?php
                                $date = new DateTime($review['created_at']);
                                echo $date->format('d-m-Y H:i');
                            ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </table>
        <a class="button" href="/add-review?product_id=<?= $product['id'] ?>">Добавить отзыв</a>
    </div>
</div>
