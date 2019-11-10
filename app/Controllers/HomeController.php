<?php

namespace Citrus\Controllers;

use Citrus\Init\Controller;
use Citrus\Models\HomeModel;
use Citrus\Models\CommentModel;
use Citrus\Helpers\Validate;

class HomeController extends Controller {

    public function __construct($method)
    {
        parent::__construct($method);
    }

    public function index()
    {
        $home_model = new HomeModel();
        $data['products'] = $home_model->get_products();

        $comment_model = new CommentModel();
        $data['comments'] = $comment_model->get_all();

        $this->view->load('/layout/header');
        $this->view->load('app', $data);
        $this->view->load('/layout/footer');
    }

    public function comment()
    {
        if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['text'])) {
            $name = Validate::sanitaze($_POST['name']);
            $email = Validate::sanitaze($_POST['email']);
            $text = Validate::sanitaze($_POST['text']);

            $comment_model = new CommentModel();
            $result = $comment_model->insert($name, $email, $text);
            echo $result;
        }
    }

}
