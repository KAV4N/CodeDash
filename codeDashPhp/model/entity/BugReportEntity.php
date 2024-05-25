<?php
namespace Model\Entity;


require_once ROOT_PATH . "src/Entity.php";

use Src\Entity;

class BugReportEntity extends Entity {

    public function __construct($dbc) {
        parent::__construct($dbc, 'tbl_bug_reports');
    }

    protected function initFields() {
        $this->fields = [
            'id'=>null,
            'title'=>null,
            'description'=>null,
            'added'=>null
        ];
    }

    public function getId() {
        return $this->fields["id"];
    }

    public function getTitle() {
        return $this->fields["title"];
    }

    public function getDescription() {
        return $this->fields["description"];
    }

    public function getTime() {
        return $this->fields["added"];
    }
}