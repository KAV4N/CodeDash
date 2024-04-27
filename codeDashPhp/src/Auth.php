<?php

require_once ROOT_PATH . "model/entity/PlayerEntity.php";
require_once ROOT_PATH . "model/entity/RankEntity.php";
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
        
        $rankEntity = new RankEntity($dbc);
        $rankEntity->populateDataByFieldName("level", 1);


        $newUser = new PlayerEntity($dbc);
        $newUser->populateDataByFieldName("email", $email);
        if($newUser->getId() == null){
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $data = [
                'email' =>$email,
                'username' =>$username,
                'password' => $hashedPassword,
                'join_date'=> date("Y-m-d H:i:s"),
                'exp' => 0,
                'rank_id' => $rankEntity->getLevel(),
                'typed'=>0,
                'errors'=>0,
                'aboutme'=>null,
                'is_admin' => 0,
                'is_banned' => 0
                
            ];
            
            if ($newUser->insertData($data)) {
                $newUser->populateDataByFieldName("email",$email);
                $_SESSION["user_id"] = $newUser->getId();
                $_SESSION["is_admin"] = $newUser->getRole();
                return true; 
            } else {
                return false;
            }
            
        }else{
            return false;
        }

       
    }
}