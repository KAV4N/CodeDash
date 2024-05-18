<?php
require_once ROOT_PATH . "model/dto/LeaderboardDto.php";
require_once ROOT_PATH . "model/entity/PlayerEntity.php";



class LeaderboardService{
    private $dbc;

    private $playerRepository;

    public function __construct($dbc){
        $this->dbc = $dbc;
        $this->playerRepository = new PlayerEntity($this->dbc);
    }


    public function getLeaderboardData(){
        $dtos = [];
        $players = $this->playerRepository->selectAllEntities("rank_id", "DESC");

        foreach ($players as $entity) {
            $dto = new LeaderboardDto(
                $entity->getUsername(),
                $entity->getRank()->getName(),
            );
            $dtos[] = $dto;
        }
        return $dtos;
        
    }
}
