<?php

if (!function_exists('dd')) {
    function dd($var)
    {
        echo '<pre>' . htmlspecialchars(print_r($var, true), ENT_QUOTES, 'UTF-8') . '</pre>';
        die();
    }
}