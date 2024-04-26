<?php
require_once ROOT_PATH . "model/dto/RaceDataDto.php";
require_once ROOT_PATH . "model/entity/CodeEntity.php";




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

    public function getRandomCodeDto(){
        $codeEntity = new CodeEntity($this->dbc);
        $codeEntity->populateRandomData();
        if ($codeEntity->getId()){
            return new RaceDataDto(
                $codeEntity->getPlayer()->getUsername(),
                $codeEntity->getDifficulty()->getName(),
                $codeEntity->getLanguageName()->getLanguageName(),
                $codeEntity->getDifficulty()->getTime(),
                $this->codeMapper->parseCodeSnippet($codeEntity->getSnippet())
            );
        }
        return new RaceDataDto(
            "None",
            "None",
            "None",
            0,
            $this->codeMapper->parseCodeSnippet("None")
        );
    }
}