<?php
require_once ROOT_PATH . "src/Entity.php";



class RankEntity extends Entity {

    public function __construct($dbc) {
        parent::__construct($dbc, 'tbl_ranks');
    }

    protected function initFields() {
        $this->fields = [
            'id'=>null,
            'name'=>null,
            'exp'=>null,
            'level'=>null
        ];
    }

    public function getId() {
        return $this->fields["id"];
    }

    public function getName() {
        return $this->fields["name"];
    }

    public function getExp() {
        return $this->fields["exp"];
    }

    public function getLevel() {
        return $this->fields["level"];
    }
}