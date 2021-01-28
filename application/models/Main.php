<?php

namespace application\models;

use application\core\Model;

class Main extends Model {

	public function getProducts($sortQuery = '') {

		$result = $this->db->row("
            SELECT products.id, products.product_name, products.img, products.created_at, users.user_name, products.price 
            FROM products
            LEFT JOIN users ON products.user_id_fk = users.id
            $sortQuery");

		return $result;
	}

    public function getCountReviews($product) {
	    $query = "SELECT COUNT(*) AS count
                  FROM reviews 
                  WHERE product_id_fk = '$product'";
        $count = $this->db->row($query);

        return $count[0]['count'];
    }
}