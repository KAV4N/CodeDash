<?php

class RacePageController extends Controller{

    private $codeService;

    public function __construct($codeService){
        $this->codeService = $codeService;
    }

    function defaultAction() {
        $raceDataDto = $this->codeService->getRandomCodeDto();
        $template = new Template('default');
        $template->view('race');
    }
    
}
