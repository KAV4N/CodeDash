<?php
require_once ROOT_PATH . "model/dto/PlayerDto.php";
require_once ROOT_PATH . "model/entity/PlayerEntity.php";




class PlayerService{
    private PDO $dbc;

    public function __construct(PDO $dbc){
        $this->dbc = $dbc;
    }

    public function getPlayerData(){
        $playerEntity = new PlayerEntity($this->dbc);
        $playerEntity->populateData($_SESSION["user_id"]);
        if ($playerEntity->getId()){
            
            return new PlayerDto(
                    $playerEntity->getUsername(),
                    $playerEntity->getExp(),
                    $playerEntity->getAboutMe(),
                    $playerEntity->getTyped(),
                    $playerEntity->getErrors(),
                    $playerEntity->getRank()->getName(),
                    $playerEntity->getRank()->getExp(),
                    $playerEntity->getRank()->getLevel()
            );
        }
        
    }
}
