<?php

class AuthController extends Controller {
    
/*
    public function runBeforeAction() {
        if($_SESSION['user_id'] ?? false == true){
            return true;
        }
        $action = $_GET['action'] ?? $_POST['action'] ?? 'default';
        if($action != 'login'){
            header('Location: ../public/index.php');
        } else {
            return true;
        }
    }*/
    
    public function defaultAction(){
        $template = new Template('default');
        $template->view('auth');
    }

    public function loginAction() {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $auth = new Auth();
        $suc = $auth->loginUser($email, $password);
        $this->switchContent($suc);
        
        
    }

    public function registerAction(){
        $email = $_POST['email'] ?? '';
        
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        $auth = new Auth();
        $suc = $auth->registerUser($email, $username, $password);
        $this->switchContent($suc);
         
    }

    private function switchContent($suc){
        if ($suc){
            $template = new Template('default');
            $template->view('index');
        }else{
            $template = new Template('default');
            $template->view('auth');
        }
    }

}