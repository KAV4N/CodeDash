<?php
namespace Src;

session_start();
if (isset($_SESSION["user_id"])){
    $_SESSION = [];
    session_destroy();
    header("Location: ../public/index.php");
}

