<?php

namespace Src;

class Template {
    private $layout;
    private $attributes = [];

    public function __construct($layout) {
        $this->layout = $layout;
    }

    function addAttribute($name, $value){
        $this->attributes[$name] = $value;
    }

    function view($template){        
        include VIEW_PATH . 'layout/' . $this->layout .  '.php';  
    }
}