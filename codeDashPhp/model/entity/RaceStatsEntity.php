<?php
require_once ROOT_PATH . "src/Entity.php";
require_once ROOT_PATH . "model/entity/PlayerEntity.php";
require_once ROOT_PATH . "model/entity/CodeEntity.php";


class RaceStatsEntity extends Entity {

    public function __construct($dbc) {
        parent::__construct($dbc, 'tbl_race_stats');
    }

    protected function initFields() {
        $this->fields = [
            'id'=>null,
            'wpm'=>null,
            'time_left'=>null,
            'accuracy'=>null,
            'play_date'=>null
        ];
        $this->foreignKeys = [
            "player_id" => new PlayerEntity($this->dbc),
            "code_id" => new CodeEntity($this->dbc)
        ];
    }

    public function getId() {
        return $this->fields["id"];
    }

    public function getWpm() {
        return $this->fields["wpm"];
    }

    public function getTimeLeft() {
        return $this->fields["time_left"];
    }

    public function getAccuracy() {
        return $this->fields["accuracy"];
    }


    public function getPlayer() {
        return $this->foreignKeys["player_id"];
    }

    public function getCode() {
        return $this->foreignKeys["code_id"];
    }

}