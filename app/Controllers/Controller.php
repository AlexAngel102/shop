<?php

namespace App\Controllers;

class Controller
{
    public static function check($variable)
    {
        if (isset($variable) && !empty($variable)) {
            return $variable;
        } else {
            echo "Invalid data input";
            exit();
        }
    }
}