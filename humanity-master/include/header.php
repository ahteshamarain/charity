<?php
session_start();

// Check if the user is logged in and if Role_id is 1
$is_logged_in = isset($_SESSION['username']) && $_SESSION['Role_id'] == 1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Humanity</title>
    <meta name="generator" content="Bootply" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="css/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="css/demo.css" />
    <link rel="stylesheet" href="css/testimonial.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
</head>

<body>
    <div class="header container">
        <div class="visible-xs visible-sm col-xs-12 col-sm-12 text-center sm-logo">
            <a rel="home" href="index.php">
                <img src="img/logo.png" width="200" alt="logo">
            </a>
        </div>
    </div>
    <div class="navbar" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="selected"><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="service.php">Services</a></li>
                <li><a href="gallery.php">Gallery</a></li>
                <li class="hidden-xs hidden-sm">
                    <a rel="home" href="index.php"><img class="logo" src="img/logo.png" width="200" alt="logo"></a>
                </li>
            
                <li><a href="team.php">Brands</a></li>
                <li><a href="donate.php">Donate</a></li>
                <li><a href="contact.php">Contact</a></li>

                <?php if (!$is_logged_in): ?>
                    <!-- Show Login link if not logged in -->
                    <li><a href="login.php">Login</a></li>
                <?php else: ?>
                    <!-- Show username if Role_id is 1 -->
                    <li class="dropdown" style="position: relative;">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="cursor: pointer;">
                            <?php echo htmlspecialchars($_SESSION['username']); ?> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu" style="min-width: 160px; padding: 15px;">
                            <hr>
                            <a href="./dashmin/index.php" class="btn btn-primary btn-block">User Panel</a>
                            <a href="logout.php" class="btn btn-danger btn-block">Logout</a>
                        </ul>
                    </li>
                <?php endif; ?>

            </ul>
        </div>
    </div>

    <!-- Include necessary JavaScript files -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        // Optional: Keep the dropdown open on hover
        $('.dropdown').hover(function() {
            $(this).children('.dropdown-menu').stop(true, true).slideDown(200);
        }, function() {
            $(this).children('.dropdown-menu').stop(true, true).slideUp(200);
        });
    </script>
</body>
</html>
