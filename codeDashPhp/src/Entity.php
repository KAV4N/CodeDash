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

    public function getEntitiesByColumnValue($fieldName, $value) {
        try {
            $entities = [];
            
            $sql = "SELECT * FROM $this->tableName WHERE $fieldName = :value";
            $stmt = $this->dbc->prepare($sql);
            $stmt->bindParam(':value', $value);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            foreach ($results as $result) {
                $entity = new static($this->dbc); 
                $entity->populateEntityData($result);
                $entities[] = $entity; 
            }
            
            return $entities;
        } catch (PDOException $e) {
            return array();
        }
    }
    
    public function getTopEntitiesByColumnValue($fieldName, $value, $orderFieldName, $order = 'ASC', $amount = null) {
        try {
            $entities = [];
            
            $order = strtoupper($order);
            if ($order !== 'ASC' && $order !== 'DESC') {
                throw new InvalidArgumentException("Invalid order parameter.");
            }
            
            $sql = "SELECT * FROM $this->tableName";
            if ($fieldName !== null) {
                $sql .= " WHERE $fieldName = :value";
            }
            $sql .= " ORDER BY $orderFieldName $order";
            $sql = ($amount !== null) ? $sql . " LIMIT :amount" : $sql;
            $stmt = $this->dbc->prepare($sql);
            if ($fieldName !== null) {
                $stmt->bindParam(':value', $value);
            }
            $stmt->bindParam(':amount', $amount, PDO::PARAM_INT);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            foreach ($results as $result) {
                $entity = new static($this->dbc); 
                $entity->populateEntityData($result);
                $entities[] = $entity; 
            }
            
            return $entities;
        } catch (PDOException $e) {
            return array();
        }
    }
    

    public function updateData($id, $data){
        try {
            $setValues = [];
            foreach ($data as $key => $value) {
                $setValues[] = "$key = :$key";
            }
            $setClause = implode(', ', $setValues);

            $sql = "UPDATE $this->tableName SET $setClause WHERE id = :id";
            $stmt = $this->dbc->prepare($sql);

            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            foreach ($data as $key => $value) {
                $stmt->bindValue(":$key", $value);
            }
          
            $stmt->execute();
            return $this->populateData($id);

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    
    private function orderBy($sql, $orderBy, $orderType="ASC", $limit=null) {
        if (!empty($orderBy)) {
            $sql .= " ORDER BY $orderBy $orderType";
        }
        if (!empty($limit)) {
            $sql .= " LIMIT $limit";
        }
    
        return $sql;
    }
    

    public function selectAllEntities($orderBy=null, $orderType="ASC") {
        try {
            $entities = [];
    
            $sql = "SELECT * FROM $this->tableName";
            $sql = $this->orderBy($sql, $orderBy, $orderType);
            
            $stmt = $this->dbc->prepare($sql);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            foreach ($results as $result) {
                $entity = new static($this->dbc);
                $entity->populateEntityData($result);
                $entities[] = $entity;
            }
    
            return $entities;
        } catch (PDOException $e) {
            return array();
        }
    }

    public function deleteData($id) {
        try {
            $sql = "DELETE FROM $this->tableName WHERE id = :id";
            $stmt = $this->dbc->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
      

}