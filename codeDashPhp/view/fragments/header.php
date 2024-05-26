<?php

function active($current_value){
  if(isset($_GET["section"]) && $_GET["section"] == $current_value){
      echo 'active';
  } 
}

function isActive($current_value){
  if(isset($_GET["section"]) && $_GET["section"] == $current_value){
      return true;
  } 
  return false;
}
?>

<header class="navbar navbar-expand-lg sticky-top navbar-default border-gradient only-bottom ">
  <nav class="container-xxl bd-gutter">
    <div class="d-flex align-items-center">
      <a data-value="CodeDash" class="navbar-brand codeDash-home" href = "../public/index.php" style="width: 100px; display: inline-block; overflow: hidden; white-space: nowrap;">CodeDash</a>

      <div class="vr"></div>
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <hr class="solid">
          <li>
            <a class="nav-link <?php active('race');?>" href = "../public/index.php?section=race">Race</a>
          </li>
          <li>
            <a class="nav-link <?php active('leaderboard');?>" href = "../public/index.php?section=leaderboard">Leaderboard</a>
          </li>
          <li>
            <a class="nav-link <?php active('about-us');?>" href = "../public/index.php?section=about-us">About</a>
          </li>
        </ul>
        <hr class="solid">
        <div>
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">

            <hr class="solid">
            <li>
              <?php
                if(isset($_SESSION['user_id'])) {
                  if (isset($_SESSION["is_admin"]) && $_SESSION["is_admin"] === 1){
                    echo '<a class="btn btn-outline-success my-2 my-sm-0 me-2" href="../public/index.php?section=bugReportDashboard">BugReports</a>';
                    echo '<a class="btn btn-outline-success my-2 my-sm-0 me-2" href="../public/index.php?section=playersDashboard">Players</a>';
                  }
                  echo '<a class="btn btn-outline-light my-2 my-sm-0" href="../public/index.php?section=profile" style="width: 100px;">Profile</a>';
                } else if (!isActive("auth")) {
                  echo '<a class="btn btn-outline-light my-2 my-sm-0" href="#" data-bs-toggle="modal" data-bs-target="#loginModal" style="width: 100px;">Log In</a>';
                }
              ?>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
</header>
