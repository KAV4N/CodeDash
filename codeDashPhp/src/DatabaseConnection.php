<?php
namespace Src;
use PDO;
use PDOException;

final class DatabaseConnection{
    private static $instance = null;
    private static $connection;

    private function __construct(){}


    public static function getInstance(){
        if (is_null(self::$instance)){
            self::$instance = new DatabaseConnection();
        }
        return self::$instance;
    }

    public static function connect($host, $dbName, $user, $password){
        try {
            self::$connection = new PDO("mysql:dbname=$dbName;host=$host",$user,$password);

        } catch(PDOException $error) {
            echo $error->getMessage();
        } 
    }

    public static function getConnection(){
        return self::$connection;
    }

}
