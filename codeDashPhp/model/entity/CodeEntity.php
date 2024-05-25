<?php
namespace Model\Entity;

require_once ROOT_PATH . "src/Entity.php";
require_once ROOT_PATH . "model/entity/PlayerEntity.php";
require_once ROOT_PATH . "model/entity/DifficultyEntity.php";
require_once ROOT_PATH . "model/entity/ProgrammingLanguageEntity.php";


use Src\Entity;
use Model\Entity\DifficultyEntity;
use Model\Entity\PlayerEntity;
use Model\Entity\ProgrammingLanguageEntity;


class CodeEntity extends Entity {
    
    public function __construct($dbc) {
        parent::__construct($dbc, 'tbl_code');
    }
    
    protected function initFields() {
        $this->fields = [
            'id'=>null,
            'snippet'=>null,
            'creation_date'=>null,
            'description'=>null
        ];

        $this->foreignKeys = [
            "difficulty_id"=> new DifficultyEntity($this->dbc),
            "player_id"=> new PlayerEntity($this->dbc),
            "language_name_id"=>new ProgrammingLanguageEntity($this->dbc)
        ];
    }

    public function getId() {
        return $this->fields["id"];
    }

    public function getSnippet() {
        return $this->fields["snippet"];
    }
    public function getCreationDate(){
        return $this->fields["creation_date"];
    }

    public function getDescription(){
        return $this->fields["description"];
    }
    
    public function getDifficulty() {
        return $this->foreignKeys["difficulty_id"];
    }

    public function getPlayer() {
        return $this->foreignKeys["player_id"];
    }

    public function getLanguageName() {
        return $this->foreignKeys["language_name_id"];
    }



}