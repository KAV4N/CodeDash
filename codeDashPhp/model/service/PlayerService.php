<?php
require_once ROOT_PATH . "model/dto/PlayerDto.php";
require_once ROOT_PATH . "model/dto/RaceStatsDto.php";
require_once ROOT_PATH . "model/entity/PlayerEntity.php";
require_once ROOT_PATH . "model/entity/RaceStatsEntity.php";



class PlayerService{
    private PDO $dbc;

    public function __construct(PDO $dbc){
        $this->dbc = $dbc;
    }

    private function getRaceStatsDto() {
        $dtos = [];
        $raceStatsEntity = new RaceStatsEntity($this->dbc);
        $raceStats = $raceStatsEntity->getTopEntitiesByColumnValue("player_id", $_SESSION["user_id"],"play_date","DESC",10);

        foreach ($raceStats as $entity) {
            $dto = new RaceStatsDto(
                $entity->getCode()->getLanguageName()->getLanguageName(),
                $entity->getCode()->getDifficulty()->getName(),
                $entity->getWpm(),
                $entity->getTimeLeft(),
                $entity->getAccuracy(),
                $entity->getPlayer()->getUsername()
            );
            $dtos[] = $dto;
        }

        return $dtos;
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
                    $playerEntity->getRank()->getLevel(),
                    $this->getRaceStatsDto()
            );
        }
        
    }
}
