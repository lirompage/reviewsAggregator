<?php

namespace application\controllers;

use application\core\Controller;
use application\models\Main;

class MainController extends Controller {

	public function indexAction() {
	    $sort = $this->productsSort();
		$result = $this->model->getProducts($sort);
		$vars = [
			'products' => $result,
		];
		$this->view->render('Главная страница', $vars);
	}

    public static function countReviews($product) {
        $model = new Main();
        $result = $model->getCountReviews($product);
        return $result;
    }

    public function productsSort() {
	    if(isset($_GET['product_sort'])) {
	        $sort = 'ORDER BY product_name '. $_GET['product_sort'];
	        return $sort;
        } elseif (isset($_GET['date_sort'])) {
            $sort = 'ORDER BY created_at '. $_GET['date_sort'];
            return $sort;
        } elseif (isset($_GET['user_sort'])) {
            $sort = 'ORDER BY user_name '. $_GET['user_sort'];
            return $sort;
        } elseif (isset($_GET['review_sort'])) {
            $sort = 'ORDER BY created_at ' . $_GET['review_sort'];
            return $sort;
        } else {
	        return $sort = '';
        }
    }
}