<?php

class Controller {

    public function runAction($actionName) {
        if(method_exists($this, 'runBeforeAction')){
            $result = $this->runBeforeAction();
            if($result === false) {
                return;
            }
        }
        $actionName .= 'Action';
        if (method_exists($this, $actionName)){
            $this->$actionName();
        } else { 
            $template = new Template('default');
            $template->view('statusPages/404');
        }
    }
}
