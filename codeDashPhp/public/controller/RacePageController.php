<?php

class RacePageController extends Controller{


    function defaultAction() {
        $template = new Template('default');
        $template->view('race');
    }
    
}
?>