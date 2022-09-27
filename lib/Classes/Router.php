<?php

namespace App\Classes;

class Router
{
    private static array $routs = [];

    public static function run()
    {

        $uri = $_SERVER['REQUEST_URI'];
        $action = $_SERVER['REQUEST_METHOD'];
        $routs = self::$routs;
        foreach ($routs as $rout) {
            if (in_array($action, $rout)) {
                if (self::checkURI($rout, $uri)) {
                    self::runMethod($rout);
                    return;
                }
            }
        }
        http_response_code(404);
    }

    /*
     *  @ Type of return result
     *  $json = json | default = false
     */

    public static function route(string $requestMethod, string $uri, string|callable $controllerMethod, bool $json = false)
    {
        $method = self::methodLoad($controllerMethod);

        self::$routs[] = [
            'uri' => $uri,
            'action' => $requestMethod,
            'method' => $method,
            'json' => $json,
        ];
    }

    private static function methodLoad(string|callable $controllerMethod)
    {

        return match (is_callable($controllerMethod)) {
            true => $controllerMethod,
            default => self::methodParse($controllerMethod),
        };
    }

    private static function methodParse(string $controllerMethod)
    {
        if (str_contains($controllerMethod, '::')) {
            $arr = explode('::', $controllerMethod);
            $controllers = "App\\Controllers\\" . $arr[0];
            if (class_exists($controllers)) {
                $controller = new $controllers;
                $method = $arr[1];
                if (method_exists($controller, $method)) {
                    return [
                        'controller' => $controller,
                        'func' => $method];
                }
            }
        }
    }

    private static function checkURI(array $rout, string $uri)
    {
        $rout = strtolower($rout['uri']);
        $uri = strtolower($uri);
        $res = '/' . str_replace('/', '\\/', $rout) . '/';
        preg_match($res, $uri, $matches);
        if (isset($matches[0])) {
            return true;
        }
        return false;
    }


    private static function runMethod(array $rout)
    {
        switch (is_callable($rout['method'])) {
            case true:
                call_user_func($rout['method']);
                break;
            default:
                $controller = new $rout['method']['controller'];
                $method = $rout['method']['func'];
                switch ($rout['json']) {
                    case true:
                        header('content-type: application/json; charset=utf-8');
                        echo json_encode($controller->$method());
                        break;
                    case false:
                        $controller->$method();
                        break;
                    default:
                        $controller->$method();
                }
        }
    }
}