<?php
require_once ROOT_PATH . "model/entity/BugReportEntity.php";

class BugReportService{
    private $dbc;
    private $bugRepository;
    
    public function __construct($dbc){
        $this->dbc = $dbc;
        $this->bugRepository = new BugReportEntity($this->dbc);
    }

    public function insertReport($data){
         $this->bugRepository->insertData($data);
    }
}
