<?php
namespace Src;

//test for log out user
session_start();
$_SESSION = array();
session_destroy();
header("Location: ../public/index.php");
exit();
