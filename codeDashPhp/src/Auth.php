<?php

require_once ROOT_PATH . "model/entity/PlayerEntity.php";
class Auth {

    public function loginUser($email, $password) {
        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();
        $userObj = new PlayerEntity($dbc);
        $userObj->populateDataByFieldName("email", $email);
        
        if($userObj->getId() != null && password_verify( $password , $userObj->getPassword())){
            $_SESSION["user_id"] = $userObj->getId();
            $_SESSION["is_admin"] = $userObj->getRole();
            return true;
            
        }else{
            return false;
        }
        
    }
    public function registerUser($email, $username, $password) {
        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();
        
        $newUser = new PlayerEntity($dbc);
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $data = [
            'email' =>$email,
            'username' =>$username,
            'password' => $hashedPassword,
            'exp' => 0,
            'level' => 1,
            'role' => 0,
            'id_rank' => 1
        ];
        
        if ($newUser->insertData($data)) {
            $newUser->populateDataByFieldName("email",$email);
            $_SESSION["user_id"] = $newUser->getId();
            $_SESSION["is_admin"] = $newUser->getRole();
            return true; 
        } else {
            return false;
        }
    }
}