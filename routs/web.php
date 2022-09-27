<?php

use App\Classes\Router;

/**
 * Multiple params for $_GET request
 * /\/?((&|\?)[a-zA-Z]+=(\w+))+
 * /(\?(VAR=(\d+)))$
 **/


Router::route("GET", '/$', 'MainController::view');