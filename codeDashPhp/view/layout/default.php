<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../view/static/css/bootstrap.css" rel="stylesheet">
    <link href="../view/static/css/ide.css" rel="stylesheet">
    <link href="../view/static/css/bg-animation-style.css" rel="stylesheet">
    <!-- <link href="../view/static/css/bg-glow-style.css" rel="stylesheet"> -->
    <title>CodeDash</title>
</head>
<body class = "p-0 m-0">
  <div  id="wrapper-outside-blob" class ="container-fluid overflow-x-hidden p-0 m-0" style="z-index:1;">
        <div id="blob"></div>
        <div id="blur"></div>
    </div>

    <div  id="wrapper-outside-text" class ="container-fluid overflow-x-hidden p-0 m-0" style="z-index:2;">
    </div>
    <div id="wrapper-inside" class ="container-fluid overflow-x-hidden overflow-y-auto p-0 m-0 h-100 d-flex flex-column" style="position: fixed;top:0;left:0; z-index:3; scrollbar-width: thin;">
        
        <?php include VIEW_PATH . "fragments/header.php" ?>

        <?php include VIEW_PATH . $template . ".php"; ?>

        <?php include VIEW_PATH . "fragments/footer.php" ?>
    
    </div>
    <?php include VIEW_PATH . "fragments/login.php" ?>

    <?php 
    if (isset($_GET["section"]) && $_GET["section"] === "update-profile"){
        include VIEW_PATH . "fragments/delete-modal.php" ;
    }
    ?>

    <?php include VIEW_PATH . "fragments/bug-report.php" ?>

    <div id="alertContainer" class="position-fixed bottom-0 start-0 end-0 p-3 w-100" style="z-index: 11">
        <div id="customAlert" class="d-none alert alert-success alert-dismissible fade show" role="alert">
            Thanks for signing up!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="hideAlert()"></button>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script src="../view/static/js/bg-animation.js"></script>
<script src="../view/static/js/reveal-animation.js"></script>
<!-- <script src="../view/static/js/bg-glow.js"></script> -->
<script src="../view/static/js/navbar-color-change.js"></script>

</body>
</html>
