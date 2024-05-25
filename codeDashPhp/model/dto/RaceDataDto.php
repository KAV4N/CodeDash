<?php

namespace Model\Dto;


class RaceDataDto {
    
    public  $creatorName;
    public  $difficulty;
    public  $programmingLanguage;
    public  $time;
    public $description;
    public  $lineCode;

    public $raceStats;

    public $createdAt;

    public $codeId;

    public function __construct(
        $creatorName,
        $difficulty,
        $programmingLanguage,
        $time,
        $lineCode,
        $raceStats,
        $createdAt,
        $codeId,
        $description = null,
    ) {
        $this->creatorName = $creatorName;
        $this->difficulty = $difficulty;
        $this->programmingLanguage = $programmingLanguage;
        $this->time = $time;
        $this->lineCode = $lineCode;
        $this->description = $description;
        $this->raceStats = $raceStats;
        $this->createdAt = $createdAt;
        $this->codeId = $codeId;
    }
}