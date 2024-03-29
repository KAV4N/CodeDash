<?php

class RacePageController extends Controller{

    private $codeService;

    public function __construct($codeService){
        $this->codeService = $codeService;
    }

    function defaultAction() {
        $data = $this->codeService->getRandomCodeDto();
        $template = new Template('default');

        $codeData = $data->lineCode->codeSnippet;
        $lineNumbers = $data->lineCode->lineNumbers;
        $creatorName = $data->creatorName;
        $difficulty = $data->difficulty;
        $programmingLanguage = $data->programmingLanguage;
        $time = $data->time;

        $codeDataSize = count($codeData);
        $maxId = $codeDataSize > 0 ? $codeDataSize - 1 : 0;
        
        $template->addAttribute("activePage", "race");

        $template->addAttribute("lineNumbers", $lineNumbers);
        $template->addAttribute("codeData", $codeData);
        $template->addAttribute("maxId", $maxId);
        $template->addAttribute("creatorName", $creatorName);
        $template->addAttribute("difficulty", $difficulty);
        $template->addAttribute("playTime", $time);
        $template->addAttribute("programmingLanguage", $programmingLanguage);
        $template->addAttribute("time", $time);

        $template->view('race');
    }
    
}
