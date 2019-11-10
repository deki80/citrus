<?php

namespace Citrus\Init;

class View {
    private $view_name = 'index';

    public function __construct()
    {

    }

    public function load($view = '404', $data = [])
    {

        if(file_exists(VIEWS.$view.'.php')) {
            require_once VIEWS.$view.'.php';
        } else {
            require_once VIEWS.'404.php';
        }
    }
}
