<?php
require_once ROOT_PATH . "src/TupleLineCode.php";

class RaceDataDto {
    
    public  $creatorName;
    public  $difficulty;
    public  $programmingLanguage;
    public  $time;
    public $description;
    public  $lineCode;

    public $raceStats;

    public $createdAt;

    public function __construct(
        string $creatorName,
        string $difficulty,
        string $programmingLanguage,
        int $time,
        TupleLineCode $lineCode,
        $raceStats,
        $createdAt,
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
    }
}