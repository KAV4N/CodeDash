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

    public function populateDataByFieldName($fieldName, $value) {
        try {
            $sql = "SELECT * FROM " . $this->tableName . " WHERE $fieldName = :value";
            $stmt = $this->dbc->prepare($sql);
            $stmt->bindParam(':value', $value);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$result){
                return false;
            }
            $this->populateEntityData($result);
            return true;
        } catch (PDOException $e) {
            //echo "Error: " . $e->getMessage();
            return false;
        }
    }
    

    public function populateData($id) {
        try {
            $sql = "SELECT * FROM " . $this->tableName . " WHERE id = :id";
            $stmt = $this->dbc->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$result){
                return false;
            }
            $this->populateEntityData($result);
            return true;
        } catch (PDOException $e) {
            //echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function populateRandomData(){
        try {
            $sql = "SELECT * FROM " . $this->tableName . " ORDER BY RAND() LIMIT 1";
            $stmt = $this->dbc->prepare($sql); 
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$result){
                return false;
            }
            $this->populateEntityData($result);
            return true;
        } catch (PDOException $e) {
            //echo "Error: " . $e->getMessage();
            return false;
        }
    }

    private function populateEntityData($result){
        if ($result){
            foreach ($result as $fieldName => $data) {
                if (array_key_exists($fieldName, $this->fields)){
                    $this->fields[$fieldName] = $data;
    
                }else if (array_key_exists($fieldName, $this->foreignKeys)){
                    $this->foreignKeys[$fieldName]->populateData($data);
                }
            }
        }

    }

    public function insertData($data){
        try {
            $columns = implode(', ', array_keys($data));
            $placeholders = ':' . implode(', :', array_keys($data));

            $sql = "INSERT INTO $this->tableName ($columns) VALUES ($placeholders)";
            $stmt = $this->dbc->prepare($sql);

            foreach ($data as $key => $value) {
                $stmt->bindValue(':' . $key, $value);
            }

            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

}