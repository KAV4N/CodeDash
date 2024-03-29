<?php

class AboutPageController extends Controller{

    function defaultAction() {
        $template = new Template('default');
        $template->view('about');
    }
    
}
