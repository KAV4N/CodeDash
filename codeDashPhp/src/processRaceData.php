<?php

namespace Src;

define('ROOT_PATH', dirname(__FILE__) . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR);
define('VIEW_PATH', ROOT_PATH . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR);

require_once 'DatabaseConnection.php';
require_once "databaseConfig.php";
require_once '../model/entity/RaceStatsEntity.php';
require_once '../model/entity/PlayerEntity.php';
require_once '../model/entity/DifficultyEntity.php';
require_once '../model/entity/RankEntity.php';


use Model\Entity\RaceStatsEntity;
use Model\Entity\DifficultyEntity;
use Model\Entity\RankEntity;
use Model\Entity\PlayerEntity;
use Src\DatabaseConnection;


session_start();

class ProcessRaceData {
    private $dbc;

    function __construct($dbc) {
        $this->dbc = $dbc;
    }

    function processData() {
        if (isset($_POST['raceData']) && isset($_SESSION["user_id"])) {
            $raceStatEntity = new RaceStatsEntity($this->dbc);

            
            $jsonData = $_POST['raceData'];
            $raceData = json_decode($jsonData, true);

            $typed = $raceData['typed'];
            $errors = $raceData['errors'];
            $difficulty = $raceData['difficulty'];

            unset($raceData['typed'], $raceData['errors'], $raceData['difficulty']);

            $raceData["player_id"] = $_SESSION["user_id"];
            $raceData["play_date"] = date("Y-m-d H:i:s");
            $raceStatEntity->insertData($raceData);

            $this->updatePlayerRank($typed, $errors, $difficulty);
        }
    }

    private function updatePlayerRank($typed, $errors, $difficulty) {
        $playerEntity = new PlayerEntity($this->dbc);
        $difficultyEntity = new DifficultyEntity($this->dbc);
        $rankEntity = new RankEntity($this->dbc);

        $difficultyEntity->populateDataByFieldName("name", $difficulty);
        $playerEntity->populateData($_SESSION["user_id"]);

        $playerExp = $playerEntity->getExp();
        $diffExp = $difficultyEntity->getExp();
        $rankMaxExp = $playerEntity->getRank()->getExp();

        $updatedExp = $playerExp + $diffExp;
        $updatedRankStats = [
            "exp" => $updatedExp
        ];

        if ($updatedExp >= $rankMaxExp) {
            $lastRankEntity = $rankEntity->getTopEntitiesByColumnValue(null, null, "id", "DESC", 1)[0];
           
            if (($playerEntity->getRank()->getId() + 1) < $lastRankEntity->getId()) {
                $updatedExp -= $rankMaxExp;
                $updatedRankStats["exp"] = $updatedExp;
                $updatedRankStats["rank_id"] = $playerEntity->getRank()->getId() + 1;
            } else {
                $updatedRankStats["exp"] = $lastRankEntity->getExp();
            }
        }

        $typed = $playerEntity->getTyped() + $typed;
        $errors = $playerEntity->getErrors() + $errors;

        $updatedRankStats["typed"] = $typed;
        $updatedRankStats["errors"] = $errors;

        $playerEntity->updateData($_SESSION["user_id"], $updatedRankStats);
    }
}

DatabaseConnection::connect($config["host"], $config["dbname"], $config["username"], $config["password"]);
$dbc = DatabaseConnection::getConnection();
$processRaceData = new ProcessRaceData($dbc);
$processRaceData->processData();

