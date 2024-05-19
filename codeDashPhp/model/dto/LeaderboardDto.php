<?php

namespace Model\Dto;

class   LeaderboardDto {
    public $playerName;
    public $rank;

    public function __construct(
        $playerName,
        $rank,
    ) {
        $this->playerName = $playerName;
        $this->rank = $rank;
    }
}