<?php

namespace App\Classes;

use PDO;
use PDOException;

class DBConnection extends PDO
{
    public static function connect()
    {
        try {
            extract(DotEnvParser::credentials("../.env"));
            define('DB', new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USER, $DB_PASS));
            DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e){
            error_log('PDOException - ' . $e->getMessage(), 0);
            http_response_code(500);
            die('Error establishing connection with database');
        }
    }
}