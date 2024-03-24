<?php
require_once ROOT_PATH . "src/Entity.php";



class RankEntity extends Entity {

    public function __construct($dbc) {
        parent::__construct($dbc, 'tbl_rank');
    }

    protected function initFields() {
        $this->fields = [
            'id'=>null,
            'name'=>null,
            'exp'=>null,
            'picture'=>null
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

    public function getPicture() {
        return $this->fields["picture"];
    }
}