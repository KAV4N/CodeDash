<?php
include ROOT_PATH . 'model/service/BugReportsDashboardService.php';

class BugReportDashboardController extends Controller {

    private $bugReportsDashboardService;

    public function __construct() {
        $dbh = DatabaseConnection::getInstance();
        $this->bugReportsDashboardService = new BugReportsDashboardService($dbh->getConnection());
    }

    public function runBeforeAction() {
        if (isset($_SESSION["user_id"]) && $_SESSION['is_admin'] ?? 0 === 1) {
            return true;
        }
        return false;
    }


    public function deleteAction() {
        if (isset($_POST['report_id'])) {
            $reportId = $_POST['report_id'];
            $this->bugReportsDashboardService->deleteReport($reportId);
        }
        $this->defaultAction();
    }

    public function defaultAction() {
        $template = new Template('default');
        $reportData = $this->bugReportsDashboardService->getBugReports();

        $template->addAttribute("reportData", $reportData);
        $template->view('admin/bug-reports-dashboard');
    }
}
?>
