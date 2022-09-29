<?php

if (http_response_code() >= 500) {
    require_once __DIR__."/../view/layout.php";
    die();
}
