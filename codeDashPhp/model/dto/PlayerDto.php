<?php

namespace Model\Dto;

class PlayerDto {
    public $username;
    public $exp;
    public $aboutme;
    public $typed;
    public $errors;
    public $rank;
    public $maxExp;

    public $level;

    public $raceStats;

    public function __construct(
        $username,
        $exp,
        $aboutme,
        $typed,
        $errors,
        $rank,
        $maxExp,
        $level,
        $raceStats
    ) {
        $this->username = $username;
        $this->aboutme = $aboutme;
        $this->exp = $exp;
        $this->typed = $typed;
        $this->errors = $errors;
        $this->rank = $rank;
        $this->maxExp = $maxExp;
        $this->level = $level;
        $this->raceStats = $raceStats;
    }
}