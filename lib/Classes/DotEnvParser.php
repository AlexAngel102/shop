<?php
namespace App\Classes;

/**
 * .env file instruction:
 * Each variable in new line!
 * Do not use any symbol at start of variable`s name(it will be ignored as a comment)!
 * Don`t use end of line characters, it cause error!
 *
 * File content example:
 *
 * DB_HOST = localhost:3306
 * DB_NAME = my_database
 * DB_USER = root
 * DB_PASS = root
 */


use Exception;


class DotEnvParser
{
    private static function checkAndLoad($pathToFile): array | Exception
    {
        $exists = file_exists($pathToFile);
        $match = preg_match('/.env$/', $pathToFile);
        if ($exists && $match) {
            $txt_file = file_get_contents($pathToFile);
        } else {
            throw new \InvalidArgumentExceptionAlias("File doesn't exists, match or wrong path");
        }
        $rows = explode("\n", $txt_file);
        return $rows;
    }

    public static function credentials(string $pathToFile): array|Exception
    {
        $rows = self::checkAndLoad($pathToFile);
        $credentials = [];
        $line = 0;
        foreach ($rows as $row) {
            $regex = '/^\W/';
            $regex2 = '/\W$/';
            if (preg_match($regex, $row)) {
                continue;
            }
            $row = explode("/n", $row);
            foreach ($row as $cred) {
                $exp = explode("=", $cred);
                $credentials += [trim($exp[0]) => trim($exp[1])];
            }
        }
        return $credentials;
    }
}