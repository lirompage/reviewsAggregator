<?php


namespace application\models;

use application\core\Model;

class Reviews extends Model
{

    public function add($productId, $userName, $rating, $comment) {

        $userId = $this->getUserId($userName);

        if($userId===false)
            $userId = $this->newUser($userName);

        $sql = 'INSERT INTO reviews (comment, rating, user_id_fk, product_id_fk) VALUES (:comment, :rating, :user_id_fk, :product_id_fk)';
        $bind['comment'] = $comment;
        $bind['rating'] = $rating;
        $bind['user_id_fk'] = $userId;
        $bind['product_id_fk'] = $productId;
        $this->db->query($sql,$bind);

        return true;
    }

    public function getProductReviews($id) {
        $result = $this->db->row("
            SELECT comment, rating, user_id_fk, product_id_fk, created_at
            FROM reviews
            WHERE product_id_fk = '$id'");
        return $result;
    }

    public function getOverallRating($id) {
        $result = $this->db->row("
            SELECT rating
            FROM reviews
            WHERE product_id_fk = '$id'");
        return $result;
    }

}