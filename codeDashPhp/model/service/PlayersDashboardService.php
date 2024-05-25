<?php

namespace Model\Service;

require_once ROOT_PATH . "model/dto/PlayerDashboardDto.php";
require_once ROOT_PATH . "model/entity/PlayerEntity.php";


use Model\Entity\PlayerEntity;
use Model\Dto\PlayerDashboardDto;




class PlayersDashboardService{
    private $dbc;

    private $playerRepository;


    
    public function __construct($dbc){
        $this->dbc = $dbc;
        $this->playerRepository = new PlayerEntity($this->dbc);
    }

    public function unBanPlayer($id){
        $this->playerRepository->updateData($id, ["is_banned"=>0]);
    }

    public function banPlayer($id){
        $this->playerRepository->updateData($id, ["is_banned"=>1]);
    }

    public function deletePlayer($id){
        $this->playerRepository->deleteData($id);
    }

    public function getPlayerData(){
        $dtos = [];
        $raceStats = $this->playerRepository->selectAllEntities();
        foreach ($raceStats as $entity) {
            $dto = new PlayerDashboardDto(
                $entity->getId(),
                $entity->getEmail(),
                $entity->getUsername(),
                $entity->getBanned(),
                $entity->getRole()
            );
            $dtos[] = $dto;
        }

        return $dtos;
        
    }
}
