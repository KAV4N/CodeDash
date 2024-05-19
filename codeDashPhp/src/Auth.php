<?php

require_once ROOT_PATH . "model/entity/PlayerEntity.php";
require_once ROOT_PATH . "model/entity/RankEntity.php";
require_once ROOT_PATH . "src/ValidationController.php";

class Auth {

    private $validationController;

    const ERROR_EMAIL_INVALID = "The email does not meet requirements.";
    const ERROR_USERNAME_INVALID = "The username needs to be at least 3 characters long.";
    const ERROR_PASSWORD_WEAK = "The password does not meet minimum requirements.";
    const ERROR_PASSWORD_MISMATCH = "The passwords do not match.";
    const ERROR_REGISTRATION_FAILED = "There was an error while registering. Please try again later.";
    const ERROR_LOGIN_INVALID = "Incorrect email or password.";
    const ERROR_LOGIN_BANNED = "Your account is banned.";

    const ERROR_ALREADY_REGISTERED= "The email is already registered.";

    public function __construct(){
        $this->validationController = new ValidationController();
    }

    public function loginUser($email, $password) {
        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();
        $userObj = new PlayerEntity($dbc);
        $userObj->populateDataByFieldName("email", $email);
        
        if ($userObj->getId() != null && password_verify($password, $userObj->getPassword()) ) {
            if ($userObj->getBanned() === 1){
                return self::ERROR_LOGIN_BANNED;
            }
            $_SESSION["user_id"] = $userObj->getId();
            $_SESSION["is_admin"] = $userObj->getRole();
            return "";
        } else {
            return self::ERROR_LOGIN_INVALID;
        }
    }

    public function registerUser($email, $username, $password, $confirmPassword) {

        if (!$this->validationController->validateEmail($email)) {
            return self::ERROR_EMAIL_INVALID;
        }
        if (!$this->validationController->validateUsername($username)) {
            return self::ERROR_USERNAME_INVALID;
        }
        if (!$this->validationController->validatePasswordStrength($password)) {
            return self::ERROR_PASSWORD_WEAK;
        }
        if ($confirmPassword !== $password) {
            return self::ERROR_PASSWORD_MISMATCH;
        }

        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();
        
        $rankEntity = new RankEntity($dbc);
        $rankEntity->populateDataByFieldName("level", 1);

        $newUser = new PlayerEntity($dbc);
        $newUser->populateDataByFieldName("email", $email);

        if ($newUser->getId() == null) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $data = [
                'email' => $email,
                'username' => $username,
                'password' => $hashedPassword,
                'join_date' => date("Y-m-d H:i:s"),
                'exp' => 0,
                'rank_id' => $rankEntity->getLevel(),
                'typed' => 0,
                'errors' => 0,
                'aboutme' => null,
                'is_admin' => 0,
                'is_banned' => 0
            ];
            
            if ($newUser->insertData($data)) {
                $newUser->populateDataByFieldName("email", $email);
                $_SESSION["user_id"] = $newUser->getId();
                $_SESSION["is_admin"] = $newUser->getRole();
                return ""; 
            } else {
                return self::ERROR_REGISTRATION_FAILED;
            }
        } else {
            return self::ERROR_ALREADY_REGISTERED;
        }
    }
}
