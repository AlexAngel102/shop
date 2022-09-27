<?php

namespace App\Controllers;

class MainController
{
    public static function view()
    {
        require_once __DIR__ . '/../../view/layout.php';
        require_once __DIR__.'/../../lib/404.php';
        require_once __DIR__.'/../../lib/500.php';
    }
}