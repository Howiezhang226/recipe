<?php
ob_start();
/**
 * Created by PhpStorm.
 * User: hao
 * Date: 12/12/16
 * Time: 12:53 AM
 */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title><?php if(isset($page_title)) echo $page_title?></title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
</head>
<body>
<!-- <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Recipe</a>
        </div>
        <div id="navbar">
            <ul class="nav navbar-nav">
                <?php if(isset($_SESSION['uname'])): ?>
                    <li ><a href="main-page-front.php">Home</a></li>
                    <li ><a href="search-front.php">Search</a></li>
                    <li><a href="">My Profile</a></li>
                    <li><a href="logout.php">Log out</a></li>
                <?php else: ?>
                <li><a href="signin.php">Login</a></li>
                <li><a href="signup.php">Sign Up</a></li>
                <?php endif ?>
            </ul>
        </div>
    </div>
</nav> -->
<nav class="navbar navbar-light bg-faded navbar-fixed-top">
        <a class="navbar-brand" href="#">Navbar</a>
            <ul class="nav navbar-nav">
                <?php if(isset($_SESSION['uname'])): ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="main-page-front.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">My Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Log out</a>
                    </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="signin.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="signup.php">Sign Up</a>
                        </li>
                    <?php endif ?>
            </ul>
            <?php if (isset($page_title) && ($page_title != "Welcome Page" && $page_title != "Sign In" && $page_title != "Sign Up")): ?>
                <form class="form-inline float-xs-right">
                    <input class="keyWord form-control" type="text" placeholder="Search">
                    <button class="search btn btn-outline-success" type="button">Search</button>
                </form>
            <?php endif ?>
    </nav>


<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>
    <?php if(isset($page_title) && $page_title != "search page"): ?>
        $(".search").click(function() {
            $.ajax({
                type: "POST",
                url: "resource/set-session.php",
                data: {'search_info_key': $(".keyWord").val()},
                success: function(data) {
                },
                dataType: "json"
            });
            location.href = "search-front.php";
        });
    <?php endif ?>
</script>    
</body>
</html>