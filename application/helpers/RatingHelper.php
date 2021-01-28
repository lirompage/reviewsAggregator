<?php

namespace application\helpers;

class RatingHelper
{
    public static function overallRating($mass) {
        if(empty($mass)) return;

        for ($i = 0; $i < count($mass); $i++) {
            $overallSumm = 0;
            $overallSumm += $mass[$i]['rating'];
        }
        $overallRating = round($overallSumm/count($mass));
        return $overallRating;
    }
}