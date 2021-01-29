<?php


namespace application\helpers;


class SortHelper
{
    public static function sort() {
        if(isset($_GET['product_sort']) || isset($_GET['date_sort']) || isset($_GET['user_sort']) || isset($_GET['review_sort']) ){
            if((!empty($_GET['product_sort'])) && $_GET['product_sort'] == 'DESC') {
                $sort = 'ASC';
            } elseif(!empty($_GET['product_sort']) && $_GET['date_sort'] == 'DESC') {
                $sort = 'ASC';
            } elseif(!empty($_GET['product_sort']) && $_GET['user_sort'] == 'DESC') {
                $sort = 'ASC';
            } elseif(!empty($_GET['product_sort']) && $_GET['review_sort'] == 'DESC') {
                $sort = 'ASC';
            } else {
                $sort = 'DESC';
            }
            return $sort;
        }
    }
}