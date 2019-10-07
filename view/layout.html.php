<?php $status = session_status();
if($status == PHP_SESSION_NONE){
    //There is no active session
    session_start();
} ?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="view/css/bootstrap.css">
    <link rel="stylesheet" href="view/css/style.css">
    <title><?=$titlee?></title>
</head>
    <!--NavBar-->
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <img class="navbar-brand" src="view/img/triangle.png"> 
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="btn nav-link" href="index.php?action=index">Home<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?action=viewAll">Blog</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Portfolio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?action=contactView">Contact</a>
              </li>
              </div>
              <?php if(isset($_SESSION['mail'])){
                echo '<a href="index.php?action=adminView" class="btn btn-success" role="button">Dashboard</a>';
                   }
                     else {
                           echo '<a href="index.php?action=signinView" class="btn btn-success justify-content-end" role="button">Sign In</a>';
                  } ?>
              </nav>
<?= $content ?>
</body>
</html>
    