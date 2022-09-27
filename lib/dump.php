<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

function dump($variable)
{
    echo "
    <div style='background: black; color: #808080; font-size: 14px;'>
        <pre>";
    var_dump($variable);
    echo "</pre>
            </div>";
}

function dd($variable)
{
    echo "
    <div style='background: black; color: #9f380d; font-size: 14px;'>
        <pre>";
    var_dump($variable);
    echo "</pre>
            </div>";
    die();
}
