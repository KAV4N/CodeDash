<?php
include ROOT_PATH . 'model/service/CreateRaceService.php';

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
        
        $data = [
            "snippet"=>$snippet,
            "creation_date"=>date("Y-m-d H:i:s"),
            "description"=>$description,
            "player_id"=>$_SESSION["user_id"],
            "difficulty_id"=> $this->createRaceService->getDiffId($difficulty),
            "language_name_id"=>$this->createRaceService->getLangId($language)
        ];

        $this->createRaceService->createRace($data);
        $raceStatsDto = $this->createRaceService->getRaceData();
        $template->addAttribute("language", $raceStatsDto->language);
        $template->addAttribute("difficulty", $raceStatsDto->difficulty);
        $template->view('create-race');
    }

    public function defaultAction() {
        $template = new Template('default');

        $raceStatsDto = $this->createRaceService->getRaceData();
        $template->addAttribute("language", $raceStatsDto->language);
        $template->addAttribute("difficulty", $raceStatsDto->difficulty);

        $template->view('create-race');
    }
    
}