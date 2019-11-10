<?php

namespace Citrus\Init;

class Session
{
    public static function start()
    {
        session_start();
    }

    public static function end()
    {
        $_SESSION = [];
        session_destroy();
    }

    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function get($key)
    {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : false;
    }
}
