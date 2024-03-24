<?php
require_once ROOT_PATH . "src/Entity.php";
require_once ROOT_PATH . "model/entity/RankEntity.php";

class PlayerEntity extends Entity {
    

    public function __construct($dbc) {
        parent::__construct($dbc, 'tbl_player');
        
    }
    protected function initFields() {
        
        $this->fields = [
            'id'=>null,
            'email'=>null,
            'exp'=>null,
            'level'=>null,
        ];
        $this->foreignKeys = [
            "id_rank"=>new RankEntity($this->dbc)
        ];
    }

    public function getId(){
        return $this->fields["id"];
    }

    public function getEmail(){
        return $this->fields["email"];
    }
    
    public function getLevel(){
        return $this->fields["level"];
    }

    public function getRank(){
        return $this->foreignKeys["id_rank"];
    }
}
