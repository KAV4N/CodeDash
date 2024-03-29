<?php
require_once ROOT_PATH . "src/TupleLineCode.php";

class RaceDataDto {
    
    public string $creatorName;
    public string $difficulty;
    public string $programmingLanguage;
    public int $time;
    public TupleLineCode $lineCode;

    public function __construct(
        string $creatorName,
        string $difficulty,
        string $programmingLanguage,
        int $time,
        TupleLineCode $lineCode
    ) {
        $this->creatorName = $creatorName;
        $this->difficulty = $difficulty;
        $this->programmingLanguage = $programmingLanguage;
        $this->time = $time;
        $this->lineCode = $lineCode;
    }
}