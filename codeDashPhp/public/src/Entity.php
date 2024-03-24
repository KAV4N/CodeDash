<?php
abstract class Entity {
    
    protected $dbc;
    protected $tableName;
    protected $fields;
    protected $primaryKeys = ['id'];
    protected $foreignKeys = [];

    abstract protected function initFields();

    protected function __construct($dbc, $tableName){
        $this->dbc = $dbc;
        $this->tableName = $tableName;
        $this->initFields();
    }

    public function populateData($id) {
        try {
            $sql = "SELECT * FROM " . $this->tableName . " WHERE id = :id";
            $stmt = $this->dbc->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->populateEntityData($result);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function populateRandomData(){
        try {
            $sql = "SELECT * FROM " . $this->tableName . " ORDER BY RAND() LIMIT 1";
            $stmt = $this->dbc->prepare($sql); 
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->populateEntityData($result);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    private function populateEntityData($result){
        foreach ($result as $fieldName => $data) {
            if (array_key_exists($fieldName, $this->fields)){
                $this->fields[$fieldName] = $data;

            }else if (array_key_exists($fieldName, $this->foreignKeys)){
                $this->foreignKeys[$fieldName]->populateData($data);
            }
        }
    }
}