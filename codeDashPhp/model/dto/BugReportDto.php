<?php
namespace Model\Dto;

class BugReportDto{
    
    public $id;
    public $title;
    public $description;
    public $added;

    public function __construct($id, $title, $description,$added) {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->added = $added;
    }
}