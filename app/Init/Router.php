<?php

namespace Citrus\Init;


class Router {
    private static $controller_obj;

    private static $controller = null;
    private static $method = null;

    public static function route($url = null)
    {
        $url = explode('/', $url);

        if(empty($url[1]) || !isset($url[1])) {
            self::$controller = '\\Citrus\\Controllers\\HomeController';
            self::$method = 'index';
        }else{
            self::$controller = '\\Citrus\\Controllers\\'.ucfirst($url[1]).'Controller';
            $method_from_url = empty($url[2]) ? 'index' : strtolower($url[2]);
            self::$method = $method_from_url;
        }

        if(class_exists(self::$controller)) {
            self::$controller_obj = new self::$controller(self::$method);
        }else{
            $view = new View();
            $view->load('404');
        }
    }
}