
<?php
session_start();

define('ROOT_PATH', dirname(__FILE__) . DIRECTORY_SEPARATOR);
define('VIEW_PATH', ROOT_PATH . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR);

require_once ROOT_PATH . 'src/Controller.php';
require_once ROOT_PATH . 'src/Template.php';
require_once ROOT_PATH . 'src/DatabaseConnection.php';
require_once ROOT_PATH . 'model/Page.php';


DatabaseConnection::connect("localhost","codedash_db", "root","");

$section = $_GET['section'] ?? $_POST['section'] ?? 'home';
$action = $_GET['action'] ?? $_POST['action'] ?? 'default';



if ($section=='about-us') {
    include ROOT_PATH . 'controller/AboutPageController.php';
    $aboutController = new AboutPageController();
    $aboutController->runAction($action);
} 

else if ($section == 'race'){

    include ROOT_PATH . 'controller/RacePageController.php';
    $aboutController = new RacePageController();
    $aboutController->runAction($action);

} 
else if ($section == 'leaderboard'){
    include ROOT_PATH . 'controller/LeaderboardPageController.php';
    $aboutController = new LeaderboardController();
    $aboutController->runAction($action);
}
else {

    include ROOT_PATH . 'controller/HomePageController.php';
    $homePageController = new HomePageController();
    $homePageController->runAction($action);   
}
?>



