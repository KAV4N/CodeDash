<?php
namespace Controllers;


require_once ROOT_PATH . "src/Controller.php";
require_once ROOT_PATH . "src/Template.php";

use Src\Controller;
use Src\Template;

class AboutPageController extends Controller{

    function defaultAction() {
        $template = new Template('default');
        $template->view('about');
    }
    
}
