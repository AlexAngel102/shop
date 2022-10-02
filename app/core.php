<?php

use App\Classes\Psr4AutoloaderClass;
use App\Classes\DBConnection;
use App\Classes\Router;


try {

    date_default_timezone_set('Europe/Kyiv');
    require_once __DIR__."/../lib/Classes/Psr4AutoloaderClass.php";
    require_once __DIR__."/../lib/error_handler.php";

    $loader = new Psr4AutoloaderClass;
    $loader->addNamespace('App', __DIR__ . "/../app/");
    $loader->addNamespace('App\Classes', __DIR__ . "/../lib/Classes/");
    $loader->register();

    DBConnection::connect();

    require_once __DIR__."/../routs/web.php";
    Router::run();
    require_once __DIR__."/../lib/404.php";
}catch (Exception $e){
    error_log($e->getMessage());
    http_response_code(500);
    require_once __DIR__."/../lib/500.php";
}