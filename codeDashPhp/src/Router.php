<?php
/*
class Router{
    private $dbc;

    public function __construct($dbc){
        $this->dbc = $dbc;
    }

    public function switchPage($section, $action){
        if ($section=='about-us') {
            include ROOT_PATH . 'controller/AboutPageController.php';

            $aboutController = new AboutPageController();
            $aboutController->runAction($action);
        } 
        
        else if ($section == 'race'){
            include ROOT_PATH . 'controller/RacePageController.php';
            include ROOT_PATH . 'model/service/CodeService.php';
            include ROOT_PATH . 'model/mapper/CodeMapper.php';

            $codeMapper = new CodeMapper();
            $codeService = new CodeService($codeMapper,$this->dbc);
            $raceController = new RacePageController($codeService);
            $raceController->runAction($action);
        
        } 
        else if ($section == 'leaderboard'){
            include ROOT_PATH . 'controller/LeaderboardPageController.php';

            $leaderboardController = new LeaderboardController();
            $leaderboardController->runAction($action);
        }
        else if ($section == 'home'){
            include ROOT_PATH . 'controller/HomePageController.php';
            
            $homePageController = new HomePageController();
            $homePageController->runAction($action);   
        }
        else if ($section == 'reported-bug'){
            include ROOT_PATH . 'controller/BugReportController.php';
            $bugReportController = new BugReportController();
            $bugReportController->runAction($action);   
        }
        else{
            $defaultController = new Controller();
            $defaultController->runAction("404");
        }
    }
    
}*/

require_once ROOT_PATH . "src/Entity.php";

class Router extends Entity {
    
    public function __construct($dbc) {
        parent::__construct($dbc, 'tbl_routes');
        
    }
    protected function initFields() {
        
        $this->fields = [
            'id' => null,
            'module' => null,
            'section' => null,
            'action' => null
        ];
    }


    public function switchPage($action){
        $controllerFile =  ROOT_PATH .'controller/' . $this->fields["module"]. 'Controller.php';
        $controllerClassName = $this->fields["module"] . 'Controller';
        //echo $controllerClassName;
        if ($this->fields["id"] != null && file_exists($controllerFile)) {
            include $controllerFile;
            $controller = new $controllerClassName();
            $controller->runAction($action);
        } else {
            $defaultController = new Controller();
            $defaultController->runAction("404");
        }
    }
}
