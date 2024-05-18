<?php

class RaceStatsDto {
    public $language;
    public $difficulty;
    public $wpm;
    public $timeLeft;
    public $accuracy;

    public $player;

    public function __construct(
        $language,
        $difficulty,
        $wpm,
        $timeLeft,
        $accuracy,
        $player = null
    ) {
        $this->language = $language;
        $this->difficulty = $difficulty;
        $this->wpm = $wpm;
        $this->timeLeft = $timeLeft;
        $this->accuracy = $accuracy;
        $this->player = $player;
    }
}