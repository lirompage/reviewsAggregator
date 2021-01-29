<?php


namespace application\controllers;

use application\core\Controller;
use application\models\Product;
use application\models\Reviews;
use application\helpers\RatingHelper;

class ProductController extends Controller
{

    public function productAction() {
        $id = $_GET['product'];
        $result = $this->model->getProduct($id);

        $reviews = new Reviews();
        $productReviews = $reviews->getProductReviews($id);
        $overallRating = RatingHelper::overallRating($reviews->getOverallRating($id));

        $vars = [
            'product' => $result,
            'reviews' => $productReviews,
            'overallRating' => $overallRating,
        ];

        $this->view->render($result['product_name'], $vars);
    }

    public function addProductAction() {
        $this->view->render('Добавление товара');
    }

    public function addNewProductAction() {

        if(isset($_POST['submit'])) {
            $productName = htmlspecialchars($_POST['product_name']);
            $userName    = htmlspecialchars($_POST['user_name']);
            $price       = htmlspecialchars($_POST['price']);
            $imgArr = $_FILES['img'];
            $imgName = time() . $imgArr['name'];
            if(empty($productName)) {
                echo "Заполните поля: Название товара";
            } elseif (empty($userName)) {
                echo "Заполните поле: Имя пользователя";
            } elseif (empty($price)) {
                echo "Заполните поле: Цена товара";
            } elseif ($imgArr['type'] == 'image/jpeg'
                || $imgArr['type'] == 'image/jpg'
                || $imgArr['type'] == 'image/png'
                || $imgArr['type'] == 'image/bmp') {

                $imgPath = 'public/img/';
                $img = $imgPath . basename($imgName);

                $model = new Product();
                if($model->checkProduct($productName)) {
                    $model->add($productName, $userName, $price, $img);
                    move_uploaded_file($imgArr['tmp_name'], $img);
                    chmod($img, 0666);
                    header("Location: /");
                } else {
                    header("Location: /");
                }
            } else {
                echo "Вставьте картинку с расширением jpeg/jpg/png/bmp";
            }
        }
    }
}