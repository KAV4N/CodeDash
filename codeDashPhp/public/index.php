
<?php

#https://stackoverflow.com/questions/38579325/where-do-services-go-in-mvc
session_start();

define('ROOT_PATH', dirname(__FILE__) . DIRECTORY_SEPARATOR);
define('VIEW_PATH', ROOT_PATH . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR);

require_once ROOT_PATH . 'src/Controller.php';
require_once ROOT_PATH . 'src/Template.php';
require_once ROOT_PATH . 'src/DatabaseConnection.php';
require_once ROOT_PATH . "src/Router.php";


/*
require_once ROOT_PATH . "model/entity/CodeEntity.php";
require_once ROOT_PATH . "model/entity/DifficultyEntity.php";
require_once ROOT_PATH . "model/entity/PlayerEntity.php";
require_once ROOT_PATH . "model/entity/ProgrammingLanguageEntity.php";
require_once ROOT_PATH . "model/entity/RaceStatsEntity.php";
require_once ROOT_PATH . "model/entity/RankEntity.php";
*/



DatabaseConnection::connect("localhost","codedash_db", "root","");
$dbc = DatabaseConnection::getConnection();

$section = $_GET['section'] ?? $_POST['section'] ?? 'home';
$action = $_GET['action'] ?? $_POST['action'] ?? 'default';


$router = new Router($dbc);
$router->switchPage($section, $action);



