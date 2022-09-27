<?php

if (http_response_code() >=400 && http_response_code() < 500) {
    require_once __DIR__."/../view/errors/404.html";
    require_once __DIR__."/../view/errors/mainButton.html";
    die();
}