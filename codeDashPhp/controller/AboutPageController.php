<?php
namespace Controllers;


require_once "../src/Controller.php";
require_once "../src/Template.php";

use Src\Controller;
use Src\Template;

class AboutPageController extends Controller{

    function defaultAction() {
        $template = new Template('default');
        $template->view('about');
    }
    
}
