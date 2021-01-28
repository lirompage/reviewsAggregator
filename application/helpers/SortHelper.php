<?php


namespace application\helpers;


class SortHelper
{
    public static function sort() {
        $sort = 'DESC';
        if(isset($_GET['product_sort']) || isset($_GET['date_sort']) || isset($_GET['user_sort']) || isset($_GET['review_sort']) ){
            if($_GET['product_sort'] = 'DESC') {
                $sort = 'ASC';
            } else {
                $sort = 'DESC';
            }
            if($_GET['date_sort'] = 'DESC') {
                $sort = 'ASC';
            } else {
                $sort = 'DESC';
            }
            if($_GET['user_sort'] = 'DESC') {
                $sort = 'ASC';
            } else {
                $sort = 'DESC';
            }
            if($_GET['review_sort'] = 'DESC') {
                $sort = 'ASC';
            } else {
                $sort = 'DESC';
            }
        }
    }
}