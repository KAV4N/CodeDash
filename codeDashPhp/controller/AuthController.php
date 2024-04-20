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
    
    public function loginAction() {

        if($_POST['action'] ?? "" == "login"){
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $auth = new Auth();
            $auth->loginUser($email, $password);
            header('Location: ../public/index.php');
            exit();
        }
    }

    public function registerAction(){
        
        if($_POST['action'] ?? "" == "register"){
            $email = $_POST['email'] ?? '';
            
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            $auth = new Auth();
            
            if($auth->registerUser($email, $username, $password)){
                header('Location: ../public/index.php');
                exit();
            }
        }
    }

}