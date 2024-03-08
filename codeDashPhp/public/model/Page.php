<?php

class Page{
    public $id;

    private $dbConnection;

    public function __construct($dbConnection){
        $this->dbConnection = $dbConnection;
    }

    public function findById($id){


    }


}

?>