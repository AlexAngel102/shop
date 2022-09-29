<?php

namespace App\Controllers;

class Controller
{
    public static function check($variable)
    {
        if (isset($variable) && !empty($variable)) {
            return true;
        } else {
            return false;
            exit();
        }
    }
}