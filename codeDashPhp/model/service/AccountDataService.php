<?php
require_once ROOT_PATH . "model/dto/AccountDataDto.php";




class AccountDataService{
    private PDO $dbc;

    public function __construct(PDO $dbc){
        $this->dbc = $dbc;
    }

    public function updateAccountData($data){
        $playerEntity = new PlayerEntity($this->dbc);
        $playerEntity->updateData($_SESSION["user_id"], $data);
        if ($playerEntity->getId()){
            return new AccountDataDto(
                    $playerEntity->getEmail(),
                    $playerEntity->getUsername(),
                    $playerEntity->getPassword(),
                    $playerEntity->getAboutMe()
            );
        }
        return null;
    }

    public function getAccountData(){
        $playerEntity = new PlayerEntity($this->dbc);
        $playerEntity->populateData($_SESSION["user_id"]);


        if ($playerEntity->getId()){
            return new AccountDataDto(
                    $playerEntity->getEmail(),
                    $playerEntity->getUsername(),
                    $playerEntity->getPassword(),
                    $playerEntity->getAboutMe()
            );
        }
        return null;
        
    }
}
