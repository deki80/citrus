<?php

namespace Citrus\Controllers;

use Citrus\Init\Controller;
use Citrus\Helpers\Validate;
use Citrus\Models\AdministratorModel;
use Citrus\Init\Session;
use Citrus\Models\CommentModel;
use \PDO;

class AdministratorController extends Controller
{
    public function __construct($method)
    {
        parent::__construct($method);
    }

    public function index()
    {
        $this->view->load('/admin/login');
    }

    public function login()
    {
        if(isset($_POST['uname']) && isset($_POST['psw'])) {
            $username = Validate::sanitaze($_POST['uname']);
            $password = Validate::sanitaze($_POST['psw']);

            $admin_model = new AdministratorModel();
            $check_user = $admin_model->check_admin_login($username, $password);

            if($check_user){
                Session::start();
                Session::set('user_id',$check_user);
                Session::set('username', $username);
                header('Location: /administrator/dashboard');
            }else{
                $data['message'] = "Wrong username or password...";
                $this->view->load('/admin/login',$data);
            }
        }else{
            $this->view->load('404');
        }
    }

    public function logout()
    {
        Session::end();
        header('Location: /administrator');
    }

    public function dashboard()
    {
        Session::start();
        $user_id = Session::get('user_id');

        if($user_id){
            $comment_model = new CommentModel();
            $data['comments'] = $comment_model->get_for_approval();
            $data['username'] = Session::get('username');
            $this->view->load('/admin/dashboard', $data);
        }else{
            $this->view->load('404');
        }
    }

    public function approve_comment()
    {
        Session::start();
        if(Session::get('user_id')){
            if(isset($_POST['comment_id'])){
                $comment_model = new CommentModel();
                $approved = $comment_model->approve($_POST['comment_id']);
                return 'ok';
            }else{
                $this->view->load('404');
            }
        }else{
            $this->view->load('404');
        }

    }

    public function delete_comment()
    {
        Session::start();
        if(Session::get('user_id')){
            if(isset($_POST['comment_id'])){
                $comment_model = new CommentModel();
                $deleted = $comment_model->delete($_POST['comment_id']);
            }else{
                $this->view->load('404');
            }
        }else{
            $this->view->load('404');
        }
    }
}
