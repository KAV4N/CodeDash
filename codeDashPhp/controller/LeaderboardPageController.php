<?php

namespace Controllers;

include ROOT_PATH . 'model/service/LeaderboardService.php';

use Src\Controller;
use Model\Service\LeaderboardService;
use Src\DatabaseConnection;
use Src\Template;



class LeaderboardPageController extends Controller{

    private $leaderboardService;

    public function __construct(){
        $dbh = DatabaseConnection::getInstance();
        $this->leaderboardService = new LeaderboardService($dbh->getConnection());
    }

    function defaultAction() {
        $template = new Template('default');
        $leaderBoardData = $this->leaderboardService->getLeaderboardData();

        $template->addAttribute("leaderboardData", $leaderBoardData);
        $template->view('leaderboard');
    }
    
}
