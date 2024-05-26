<?php
namespace Controllers;

require_once ROOT_PATH . "src/Controller.php";
require_once ROOT_PATH . "src/Template.php";
require_once ROOT_PATH . "src/Auth.php";

use Src\Controller;
use Src\Auth;
use Src\Template;

class AuthController extends Controller {
    
    public function runBeforeAction() {
        $canAuth = true;
        if(isset($_SESSION['user_id'])){
            $canAuth = false;
        }
        return $canAuth;
    }

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
        $confirmPassword = $_POST['confirmPassword'] ?? '';
        $auth = new Auth();
        $suc = $auth->registerUser($email, $username, $password, $confirmPassword);
        $this->switchContent($suc);
         
    }

    private function switchContent($suc){
        if (empty($suc)){
            $template = new Template('default');
            $template->view('index');
        }else{
            $template = new Template('default');
            $template->addAttribute("error", $suc);
            $template->view('auth');
        }
    }

}