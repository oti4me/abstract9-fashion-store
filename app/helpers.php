<?php

if (! function_exists('four_digits')) {
    /**
     * @param $number
     * @return string
     */
    function four_digits($number) {
        return str_pad($number, 4, '0', STR_PAD_LEFT);
    }
}
