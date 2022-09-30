<?php

use App\Classes\Router;

/**
 * Multiple params for $_GET request
 * \/((&|\?)[a-zA-Z]+=(\w+))+
 * /(\?(VAR=(\d+)))$
 **/


Router::route("GET", '/$', 'MainController::view');

Router::route("GET", '/categories', 'CategoryController::getCategories', true);

Router::route("GET", '/category'.'/(\?(id=(\d+)))&(order=(\w+))'.'&json=true', 'ItemController::getItems', true);

Router::route("GET", '/category'.'/(\?(id=(\d+)))&(order=(\w+))$', 'MainController::view');

