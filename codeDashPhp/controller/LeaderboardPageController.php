<?php
include ROOT_PATH . 'model/service/LeaderboardService.php';
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
