<?php

class HomePageController extends Controller{

    

    function defaultAction() {
        $template = new Template('default');
        $template->view('index');
    }
    
}
?>