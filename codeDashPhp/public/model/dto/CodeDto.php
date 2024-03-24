<?php
class CodeDto {
    public string $id;
    public string $character;

    public function __construct(string $id, string $character) {
        $this->id = $id;
        $this->character = $character;
    }
}