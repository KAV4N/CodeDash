<?php
require_once ROOT_PATH . "model/dto/CreateRaceDto.php";
require_once ROOT_PATH . "model/entity/CodeEntity.php";
require_once ROOT_PATH . "model/entity/DifficultyEntity.php";
require_once ROOT_PATH . "model/entity/ProgrammingLanguageEntity.php";

class CreateRaceService{
    private PDO $dbc;
    private $difficultyEntity;
    private $languageEntity;

    public function __construct(PDO $dbc){
        $this->dbc = $dbc;
        $this->difficultyEntity = new DifficultyEntity($this->dbc);
        $this->languageEntity = new ProgrammingLanguageEntity($this->dbc);
    }

    public function createRace($data){
        $codeEntity = new CodeEntity($this->dbc);
        $codeEntity->insertData($data);
    }

    private function extractDifficulty($data) {
        $diffs = [];
        foreach ($data as $entity) {
            $diffs[] = $entity->getName();
        }
        return $diffs;
    }

    private function extractLanguage($data) {
        $langs = [];
        foreach ($data as $entity) {
            $langs[] = $entity->getLanguageName();
        }
        return $langs;
    }

    public function getDiffId($name){
        $this->difficultyEntity->populateDataByFieldName("name",$name);
        return $this->difficultyEntity->getId();
    }
    public function getLangId($lang){
        $this->languageEntity->populateDataByFieldName("language_name",$lang);
        return $this->languageEntity->getId();
    }

    public function getRaceData(){


        $allDiff = $this->difficultyEntity->selectAllEntities();
        $allLang = $this->languageEntity->selectAllEntities();
        
        return new RaceStatsDto(
                $this->extractLanguage($allLang),
                $this->extractDifficulty($allDiff)
        );   
    }
}
