<?php

class PlayerDto {
    public $username;
    public $exp;
    public $aboutme;
    public $typed;
    public $errors;
    public $rank;
    public $maxExp;

    public $level;

    public function __construct(
        $username,
        $exp,
        $aboutme,
        $typed,
        $errors,
        $rank,
        $maxExp,
        $level
    ) {
        $this->username = $username;
        $this->aboutme = $aboutme;
        $this->exp = $exp;
        $this->typed = $typed;
        $this->errors = $errors;
        $this->rank = $rank;
        $this->maxExp = $maxExp;
        $this->level = $level;
    }
}