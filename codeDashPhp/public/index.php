
<?php

session_start();

define('ROOT_PATH', dirname(__FILE__) . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR);
define('VIEW_PATH', ROOT_PATH . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR);
define('PUBLIC_PATH', ROOT_PATH . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'index.php');

require_once ROOT_PATH . 'src/Controller.php';
require_once ROOT_PATH . 'src/Template.php';
require_once ROOT_PATH . 'src/DatabaseConnection.php';
require_once ROOT_PATH . "src/Auth.php";
require_once ROOT_PATH . "src/Router.php";
require_once ROOT_PATH . "src/databaseConfig.php";


use Src\DatabaseConnection;
use Src\Router;


DatabaseConnection::connect($config["host"],$config["dbname"], $config["username"],$config["password"]);
$dbc = DatabaseConnection::getConnection();


$router = new Router($dbc);




$section = $_GET['section'] ?? $_POST['section'] ?? 'home';
$action = $_GET['action'] ?? $_POST['action'] ?? 'default';

//$router = new Router($dbc);
//$router->switchPage($section, $action);


$router->populateDataByFieldName('section', $section);
$router->switchPage($action);


