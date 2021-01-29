<?php

namespace application\helpers;

class RatingHelper
{
    public static function overallRating($mass) {
        if(empty($mass)) return;

        $overallSumm = 0;
        for ($i = 0; $i < count($mass); $i++) {
            $overallSumm += $mass[$i]['rating'];
        }
        $overallRating = round($overallSumm/count($mass));

        return $overallRating;
    }
}