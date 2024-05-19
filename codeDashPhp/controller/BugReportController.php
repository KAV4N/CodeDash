<?php
namespace Controllers;

include ROOT_PATH . 'model/service/BugReportService.php';

use Src\Controller;
use Model\Service\BugReportService;
use Src\DatabaseConnection;
use Src\Template;


class BugReportController extends Controller{

    private $bugReportService;

    public function __construct(){
        $dbh = DatabaseConnection::getInstance();
        $this->bugReportService = new BugReportService($dbh->getConnection());
    }
    private function processBugReport() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['bugTitle'];
            $description = $_POST['bugDescription'];
            $time = date("Y-m-d h:i:sa");

            $data = [
                "title"=>$title,
                "description"=>$description,
                "added" => $time
            ];

            $this->bugReportService->insertReport($data);
        }
    }


    function defaultAction() {
        $template = new Template('default');
        $this->processBugReport();
        $template->view('reported-bug');
    }
    
}
