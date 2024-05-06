<?php
include ROOT_PATH . 'model/service/CodeService.php';
include ROOT_PATH . 'model/mapper/CodeMapper.php';

class RacePageController extends Controller{
    private $codeService;

    public function __construct(){
        $codeMapper = new CodeMapper();
        $dbh = DatabaseConnection::getInstance();
        $this->codeService = new CodeService($codeMapper, $dbh->getConnection());
    }

    function defaultAction() {
        $data = $this->codeService->getRandomCodeDto();
        $template = new Template('default');
        if ($data!==null){
            $codeData = $data->lineCode->codeSnippet;
            $lineNumbers = $data->lineCode->lineNumbers;
            $creatorName = $data->creatorName;
            $difficulty = $data->difficulty;
            $programmingLanguage = $data->programmingLanguage;
            $description = $data->description;
            $time = $data->time;
            $raceStats = $data->raceStats;
            $creationDate = $data->createdAt;
            $codeId = $data->codeId;

            $codeDataSize = count($codeData);
            $maxId = $codeDataSize > 0 ? $codeDataSize - 1 : 0;
            
            $template->addAttribute("activePage", "race");
    
            $template->addAttribute("lineNumbers", $lineNumbers);
            $template->addAttribute("codeData", $codeData);
            $template->addAttribute("maxId", $maxId);
            $template->addAttribute("creatorName", $creatorName);
            $template->addAttribute("difficulty", $difficulty);
            $template->addAttribute("createdAt", $creationDate);
            $template->addAttribute("programmingLanguage", $programmingLanguage);
            $template->addAttribute("description", $description);
            $template->addAttribute("raceStats", $raceStats);
            $template->addAttribute("time", $time);
            $template->addAttribute("codeId", $codeId);

            $template->view('race');

        }else{
            $template->view('statusPages/404');
        }
     

       
    }
    
}
