<?php
namespace Model\Dto;
class CreateRaceDto {
    public $language;
    public $difficulty;
    public $snippet;
    public $description;


    public function __construct(
        $language=null,
        $difficulty=null,
        $snippet=null,
        $description=null
    ) {
        $this->language = $language;
        $this->difficulty = $difficulty;
        $this->snippet = $snippet;
        $this->description = $description;
    }
}