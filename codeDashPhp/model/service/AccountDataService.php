<?php

namespace Model\Service;



require_once ROOT_PATH . "model/dto/AccountDataDto.php";
require_once ROOT_PATH . "model/entity/PlayerEntity.php";

use Model\Entity\PlayerEntity;
use Model\Dto\AccountDataDto;


class AccountDataService{
    private $dbc;

    private $playerRepository;

    public function __construct($dbc){
        $this->dbc = $dbc;
        $this->playerRepository = new PlayerEntity($this->dbc); 
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

    public function deleteAccountData($id){
        return $this->playerRepository->deleteData($id);

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
