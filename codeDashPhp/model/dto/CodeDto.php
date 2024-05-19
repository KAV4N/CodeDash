<?php
namespace Model\Dto;

class CodeDto{
    public $id;
    public  $character;

    public function __construct($id, $character) {
        $this->id = $id;
        $this->character = $character;
    }
}