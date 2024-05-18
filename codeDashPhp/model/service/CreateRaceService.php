<?php
require_once ROOT_PATH . "model/dto/CreateRaceDto.php";
require_once ROOT_PATH . "model/entity/CodeEntity.php";
require_once ROOT_PATH . "model/entity/DifficultyEntity.php";
require_once ROOT_PATH . "model/entity/ProgrammingLanguageEntity.php";

class CreateRaceService{
    private $dbc;
    private $difficultyRepository;
    private $languageRepository;
    private $codeRepository;

    public function __construct($dbc){
        $this->dbc = $dbc;
        $this->difficultyRepository = new DifficultyEntity($this->dbc);
        $this->languageRepository = new ProgrammingLanguageEntity($this->dbc);
        $this->codeRepository = new CodeEntity($this->dbc);
    }

    public function createRace($data){
        $this->codeRepository->insertData($data);
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
        $difficultyEntity = new DifficultyEntity($this->dbc);
        if ($difficultyEntity->populateDataByFieldName("name",$name)){
            return $difficultyEntity->getId();
        }
        return null;
    }
    public function getLangId($lang){
        $languageEntity = new ProgrammingLanguageEntity($this->dbc);
        if ($languageEntity->populateDataByFieldName("language_name",$lang)){
            return $languageEntity->getId();
        }
        return null;
    }

    public function getRaceData(){


        $allDiff = $this->difficultyRepository->selectAllEntities();
        $allLang = $this->languageRepository->selectAllEntities();
        
        return new RaceStatsDto(
                $this->extractLanguage($allLang),
                $this->extractDifficulty($allDiff)
        );   
    }
}
