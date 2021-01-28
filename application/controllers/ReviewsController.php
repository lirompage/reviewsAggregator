<?php

namespace application\controllers;

use application\core\Controller;
use application\models\Reviews;

class ReviewsController extends Controller
{
    public function addReviewAction() {
        $this->view->render('Отзыв о товаре');
    }

    public function addNewReviewAction() {
        if(isset($_POST['submit'])) {
            $productId = $_POST['product_id'];
            $userName  = $_POST['user_name'];
            $comment   = $_POST['comment'];
            $rating    = $_POST['rating'];

            if(empty($userName)) {
                echo "Заполните поле: Имя пользователя";
            } else {
                $model = new Reviews();
                $model->add($productId, $userName, $rating, $comment);
                header("Location: /product?product=$productId");
            }
        }
    }
}