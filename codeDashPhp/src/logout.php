<?php
namespace Src;

session_start();
if (isset($_SESSION["user_id"])){
    session_destroy();
    header("Location: ../public/index.php");
}

