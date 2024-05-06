<?php
include ROOT_PATH . 'model/service/PlayerService.php';

class ProfilePageController extends Controller{
    private $playerService;

    public function __construct(){
        $dbh = DatabaseConnection::getInstance();
        $this->playerService = new PlayerService($dbh->getConnection());
    }

    public function runBeforeAction() {
        if($_SESSION['user_id'] ?? false == true){
            return true;
        }
        return false;
    }

    function defaultAction() {
        $data = $this->playerService->getPlayerData();
        $template = new Template('default');
        
        $accuracy = ($data->typed == 0) ? 0 : (1 - ($data->errors / $data->typed)) * 100;
        $accuracy = number_format($accuracy, 2);

        $expPercentage = ($data->exp / ($data->maxExp == 0 ? 1 : $data->maxExp)) * 100;

        $template->addAttribute("username", $data->username);
        $template->addAttribute("aboutme", $data->aboutme);
        $template->addAttribute("typed", $data->typed);
        $template->addAttribute("errors", $data->errors);
        $template->addAttribute("accuracy", $accuracy);
        $template->addAttribute("rank", $data->rank);
        $template->addAttribute("exp", $data->exp);
        $template->addAttribute("maxExp", $data->maxExp);
        $template->addAttribute("level", $data->level);
        $template->addAttribute("raceStats",$data->raceStats);
        $template->addAttribute("expPercentage", $expPercentage);
        $template->view('profile');
    }
    
}