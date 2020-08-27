<?php
    require_once('common/contants.php');

    function ratings($point, $amount) {
        $rating = "";
        if($point >= 4.5*$amount) {
            $rating = XUAT_SAC;
        } else if($point >= 3.5*$amount) {
            $rating = GIOI;
        } else if($point >= 2.5*$amount) { 
            $rating = KHA;
        } else if($point >= 1.5*$amount) {
            $rating = TRUNG_BINH;
        } else {
            $rating = YEU;
        }
        return $rating;

    }
