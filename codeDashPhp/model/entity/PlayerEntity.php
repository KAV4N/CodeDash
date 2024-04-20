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
            'username'=>null,
            'password'=> null,
            'exp'=>null,
            'level'=>null,
            'role'=>null
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
    
    
    public function getUsername(){
        return $this->fields["username"];
    }

    public function getPassword(){
        return $this->fields["password"];
    }
    
    public function getLevel(){
        return $this->fields["level"];
    }

    public function getRole(){
        return $this->fields["role"];
    }

    public function getRank(){
        return $this->foreignKeys["id_rank"];
    }

}
