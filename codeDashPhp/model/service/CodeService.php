<?php
require_once ROOT_PATH . "model/dto/RaceDataDto.php";
require_once ROOT_PATH . "model/entity/CodeEntity.php";
require_once ROOT_PATH . "model/entity/RaceStatsEntity.php";




class CodeService{

    private CodeMapper $codeMapper;
    private PDO $dbc;

    /*
    private $codeEntity;
    private $difficultyEntity;
    private $playerEntity;
    private $raceEntity;
    private $programmingLanguageEntity;
    private $raceStatsEntity;
    private $rankEntity;
    */

    public function __construct(CodeMapper $codeMapper, PDO $dbc){
        $this->codeMapper = $codeMapper;
        $this->dbc = $dbc;
    }


    private function getRaceStatsDto($id) {
        $dtos = [];
        $raceStatsEntity = new RaceStatsEntity($this->dbc);
        $raceStats = $raceStatsEntity->getTopEntitiesByColumnValue("code_id", $id,"play_date","DESC",10);

        foreach ($raceStats as $entity) {
            $dto = new RaceStatsDto(
                $entity->getCode()->getLanguageName()->getLanguageName(),
                $entity->getCode()->getDifficulty()->getName(),
                $entity->getWpm(),
                $entity->getTimeLeft(),
                $entity->getAccuracy()
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
                $codeEntity->getDescription()
            );
        }
        return new RaceDataDto(
            "None",
            "None",
            "None",
            0,
            $this->codeMapper->parseCodeSnippet("None"),
            "None",
            array(),
            "None"
        );
    }
}