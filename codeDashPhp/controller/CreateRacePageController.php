<?php
namespace Controllers;

require_once "../src/Controller.php";
require_once "../src/Template.php";
require_once "../src/DatabaseConnection.php";
require_once ROOT_PATH . 'model/service/CreateRaceService.php';


use Src\Controller;
use Model\Service\CreateRaceService;
use Src\DatabaseConnection;
use Src\Template;




class CreateRacePageController extends Controller{
    private $createRaceService;

    public function __construct(){
        $dbh = DatabaseConnection::getInstance();
        $this->createRaceService = new CreateRaceService($dbh->getConnection());
    }

    public function runBeforeAction() {
        if($_SESSION['user_id'] ?? false == true){
            return true;
        }
        return false;
    }

    public function createAction(){
        $template = new Template('default');

        $language = $_POST['language-select'];
        $difficulty = $_POST['difficulty-select'];
        $snippet = $_POST['code-editor'];
        $description = $_POST['code-description']; 
        
        $difficultyId = $this->createRaceService->getDiffId($difficulty);
        $languageNameId = $this->createRaceService->getLangId($language);
        if (!($difficultyId === null || $languageNameId === null)){
            $data = [
                "snippet"=>$snippet,
                "creation_date"=>date("Y-m-d H:i:s"),
                "description"=>$description,
                "player_id"=>$_SESSION["user_id"],
                "difficulty_id"=> $difficultyId,
                "language_name_id"=> $languageNameId
            ];
    
            $this->createRaceService->createRace($data);
            $raceStatsDto = $this->createRaceService->getRaceData();
            $template->addAttribute("language", $raceStatsDto->language);
            $template->addAttribute("difficulty", $raceStatsDto->difficulty);
            $template->view('create-race');
        }else{
            $template->view('statusPages/race-not-created');
        }
        
    }

    public function defaultAction() {
        $template = new Template('default');

        $raceStatsDto = $this->createRaceService->getRaceData();
        $template->addAttribute("language", $raceStatsDto->language);
        $template->addAttribute("difficulty", $raceStatsDto->difficulty);

        $template->view('create-race');
    }
    
}