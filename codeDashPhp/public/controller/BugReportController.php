<?php

class BugReportController extends Controller{

    function defaultAction() {
        $template = new Template('default');
        $template->view('reported-bug');
    }
    
}
