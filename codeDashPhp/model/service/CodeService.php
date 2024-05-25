<?php
namespace Model\Service;


require_once ROOT_PATH . "model/dto/RaceDataDto.php";
require_once ROOT_PATH . "model/dto/RaceStatsDto.php";
require_once ROOT_PATH . "model/entity/CodeEntity.php";
require_once ROOT_PATH . "model/entity/RaceStatsEntity.php";

use Model\Dto\RaceDataDto;
use Model\Dto\RaceStatsDto;
use Model\Entity\CodeEntity;
use Model\Entity\RaceStatsEntity;


class CodeService{

    private $codeMapper;
    private $dbc;

    private $raceStatsRepository;

    public function __construct($codeMapper, $dbc){
        $this->codeMapper = $codeMapper;
        $this->dbc = $dbc;
        $this->raceStatsRepository = new RaceStatsEntity($this->dbc);
    }


    private function getRaceStatsDto($id) {
        $dtos = [];
        $raceStats = $this->raceStatsRepository ->getTopEntitiesByColumnValue("code_id", $id,"play_date","DESC",50);

        foreach ($raceStats as $entity) {
            $dto = new RaceStatsDto(
                $entity->getCode()->getLanguageName()->getLanguageName(),
                null,
                $entity->getWpm(),
                $entity->getTimeLeft(),
                $entity->getAccuracy(),
                $entity->getPlayer()->getUsername()
            );
            $dtos[] = $dto;
        }

        return $dtos;
    }

    public function getRandomCodeDto(){
        $codeEntity = new CodeEntity($this->dbc);
        $codeEntity->populateRandomData();

        if ($codeEntity->getId()){
            return new RaceDataDto(
                $codeEntity->getPlayer()->getUsername(),
                $codeEntity->getDifficulty()->getName(),
                $codeEntity->getLanguageName()->getLanguageName(),
                $codeEntity->getDifficulty()->getTime(),
                $this->codeMapper->parseCodeSnippet($codeEntity->getSnippet()),
                $this->getRaceStatsDto($codeEntity->getId()),
                $codeEntity->getCreationDate(),
                $codeEntity->getId(),
                $codeEntity->getDescription()
                
            );
        }
        return null;
        
    }
}