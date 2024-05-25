<?php

namespace Model\Entity;

require_once ROOT_PATH . "src/Entity.php";
require_once ROOT_PATH . "model/entity/RankEntity.php";

use Src\Entity;
use Model\Entity\RankEntity;


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
            'join_date'=>null,
            'exp'=>null,
            'typed'=>null,
            'errors'=>null,
            'aboutme'=>null,
            'is_admin'=>null,
            'is_banned'=>null
        ];

        $this->foreignKeys = [
            "rank_id"=> new RankEntity($this->dbc),
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
    public function getJoinDate(){
        return $this->fields["join_date"];
    }

    public function getExp(){
        return $this->fields["exp"];
    }

    public function getRole(){
        return $this->fields["is_admin"];
    }

    public function getTyped(){
        return $this->fields["typed"];
    }

    public function getErrors(){
        return $this->fields["errors"];
    }

    public function getAboutMe(){
        return $this->fields["aboutme"];
    }

    public function getBanned(){
        return $this->fields["is_banned"];
    }

    public function getRank(){
        return $this->foreignKeys["rank_id"];
    }


}
