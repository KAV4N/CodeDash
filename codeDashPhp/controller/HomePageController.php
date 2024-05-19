<?php

namespace Controllers;

use Src\Controller;
use Src\Template;

class HomePageController extends Controller{

    function defaultAction() {
        $template = new Template('default');
        $template->view('index');
    }
    
}
