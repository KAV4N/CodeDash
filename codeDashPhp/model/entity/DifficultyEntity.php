<?php

namespace Model\Entity;


require_once ROOT_PATH . "src/Entity.php";

use Src\Entity;



class DifficultyEntity extends Entity {

    public function __construct($dbc) {
        parent::__construct($dbc, 'tbl_difficulty');
    }

    protected function initFields() {
        $this->fields = [
            'id'=>null,
            'exp'=>null,
            'name'=>null,
            'time'=>null
        ];
    }

    public function getId() {
        return $this->fields["id"];
    }

    public function getExp() {
        return $this->fields["exp"];
    }

    public function getName() {
        return $this->fields["name"];
    }

    public function getTime() {
        return $this->fields["time"];
    }
}