<?php

if (!function_exists('to_date')) {

    function to_date($val)
    {
        return date('Y-m-d', $val);
    }

}

if (!function_exists('to_time')) {

    function to_time($val)
    {
        return date('H:i:s', $val);
    }

}

if (!function_exists('to_datetime')) {

    function to_datetime($val)
    {
        return date('Y-m-d H:i:s', $val);
    }

}