<?php

namespace Controllers;


require_once "../src/Controller.php";
require_once "../src/Template.php";
require_once "../src/DatabaseConnection.php";
include ROOT_PATH . 'model/service/PlayersDashboardService.php';

use Src\Controller;
use Model\Service\PlayersDashboardService;
use Src\DatabaseConnection;
use Src\Template;



class PlayersDashboardController extends Controller {

    private $playersDashboardService;

    public function __construct() {
        $dbh = DatabaseConnection::getInstance();
        $this->playersDashboardService = new PlayersDashboardService($dbh->getConnection());
    }

    public function runBeforeAction() {
        if (isset($_SESSION["user_id"]) && $_SESSION['is_admin'] ?? 0 === 1) {
            return true;
        }
        return false;
    }

    public function unbanAction() {
        if (isset($_POST['player_id'])) {
            $playerId = $_POST['player_id'];
            $this->playersDashboardService->unBanPlayer($playerId);
        }
        $this->defaultAction();
    }

    public function banAction() {
        if (isset($_POST['player_id'])) {
            $playerId = $_POST['player_id'];
            $this->playersDashboardService->banPlayer($playerId);
        }
        $this->defaultAction();
    }

    public function deleteAction() {
        if (isset($_POST['player_id'])) {
            $playerId = $_POST['player_id'];
            $this->playersDashboardService->deletePlayer($playerId);
        }
        $this->defaultAction();
    }

    public function defaultAction() {
        $template = new Template('default');
        $playersData = $this->playersDashboardService->getPlayerData();

        $template->addAttribute("playerInfoData", $playersData);
        $template->view('admin/players-dashboard');
    }
}
?>
