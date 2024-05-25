<?php

namespace Controllers;

require_once "../src/Controller.php";
require_once "../src/Template.php";
require_once "../src/DatabaseConnection.php";

require_once ROOT_PATH . 'model/service/AccountDataService.php';
require_once ROOT_PATH . "src/ValidationController.php";

use Src\Controller;
use Model\Service\AccountDataService;
use Src\ValidationController;
use Src\DatabaseConnection;
use Src\Template;


class UpdateProfilePageController extends Controller {
    private $accountService;
    private $validationController;

    public function __construct() {
        $dbh = DatabaseConnection::getInstance();
        $this->accountService = new AccountDataService($dbh->getConnection());
        $this->validationController = new ValidationController();
    }

    public function runBeforeAction() {
        if ($_SESSION['user_id'] ?? false) {
            return true;
        }
        return false;
    }

    public function saveAction() {
        $template = new Template('default');

        $newUsername = $_POST['username'];
        $newAboutMe = $_POST['aboutme'];
        $newPassword = $_POST['new_password'];
        $confirmPassword = $_POST['confirm_password'];
        $currentPassword = $_POST['current_password'];
        
        $acData = $this->accountService->getAccountData();
        $playerPassword = $acData->password; 

        $data = [
            'username' => $newUsername,
            'aboutme' => $newAboutMe
        ];
        
        $isNewPass = $this->validationController->isNewPassword($currentPassword,$confirmPassword, $newPassword);
        if ($isNewPass){
            echo $isNewPass;
            $data['password'] = password_hash($newPassword, PASSWORD_DEFAULT);
        }

        if ($isNewPass && !$this->validationController->validatePasswords($playerPassword, $currentPassword, $newPassword, $confirmPassword)) {
            $template->addAttribute("error", "Password validation failed.");
            $template->addAttribute("success", null);
        } 
        else  if (!$this->validationController->validateUsername($newUsername)) {
            $template->addAttribute("error", "Username validation failed.");
            $template->addAttribute("success", null);
        } else {
            $acData = $this->accountService->updateAccountData($data);
            $template->addAttribute("success", "Account information updated succesfully!");
            $template->addAttribute("error", null);

        }
        $template->addAttribute("username", $acData->username);
        $template->addAttribute("email", $acData->email);
        $template->addAttribute("aboutme", $acData->aboutme);
        $template->view('update-profile');
    }
    
    public function deleteAction() {
        $template = new Template('default');

        $userId = $_SESSION['user_id'];
        if ($this->accountService->deleteAccountData($userId)) {
            session_destroy();
            header("Location: ../public/index.php");
            exit();
        } else {
            $template->addAttribute("error", "Failed to delete the account. Please try again.");
            $template->view("update-profile");
        }
    }

    public function defaultAction() {
        $template = new Template('default');

        $acData = $this->accountService->getAccountData();
        $template->addAttribute("error", null);
        $template->addAttribute("success", null);
        $template->addAttribute("username", $acData->username);
        $template->addAttribute("email", $acData->email);
        $template->addAttribute("aboutme", $acData->aboutme);

        $template->view('update-profile');
    }
}

