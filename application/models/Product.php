<?php

namespace application\models;

use application\core\Model;

class Product extends Model
{
    public function add($productName,$userName,$price,$img) {

        $userId = $this->getUserId($userName);
        if($userId===false)
            $userId = $this->newUser($userName);


        $sql = 'INSERT INTO products (product_name, img, user_id_fk, price) VALUES (:product_name, :img, :user_id_fk, :price)';
        $bind['product_name'] = $productName;
        $bind['img'] = $img;
        $bind['user_id_fk'] = $userId;
        $bind['price'] = $price;
        $this->db->query($sql,$bind);

        return true;
    }

    public function checkProduct($productName) {
        $product = $this->db->column("SELECT product_name FROM products WHERE product_name = '$productName'");

        if($product===false)
            return true;
        else
            return false;
    }

    public function getProduct($id) {
        $result = $this->db->row("
            SELECT products.id, products.product_name, products.img, products.created_at, users.user_name, products.price 
            FROM products
            LEFT JOIN users ON products.user_id_fk = users.id
            WHERE products.id = '$id'");
        return $result[0];
    }
}