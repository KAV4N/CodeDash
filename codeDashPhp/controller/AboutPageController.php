<?php
namespace Controllers;

use Src\Controller;
use Src\Template;

class AboutPageController extends Controller{

    function defaultAction() {
        $template = new Template('default');
        $template->view('about');
    }
    
}
