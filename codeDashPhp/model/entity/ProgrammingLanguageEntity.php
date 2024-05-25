<?php

namespace Model\Entity;

require_once ROOT_PATH . "src/Entity.php";


use Src\Entity;


class ProgrammingLanguageEntity extends Entity {

    public function __construct($dbc) {
        parent::__construct($dbc, 'tbl_programming_language');
    }

    protected function initFields() {
        $this->fields = [
            'id'=>null,
            'language_name'=>null
        ];
    }

    public function getId() {
        return $this->fields["id"];
    }

    public function getLanguageName() {
        return $this->fields["language_name"];
    }
}