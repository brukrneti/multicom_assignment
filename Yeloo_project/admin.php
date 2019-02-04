<?php
    require_once ("functions.php");
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (isset($_SESSION["session"])) {  //if session is created redirect to index.php
        header("Location: admin_panel.php");
    }

    if (isset($_GET["logout"])) {
        $logout = $_GET["logout"];
        if ($logout == 'true') {
            unset($_SESSION["session"]);
            session_destroy();
            header('Location: admin.php');
        }
    }

    $usernameFromCookie = '';
    if (isset($_COOKIE['loggedInUser'])) {
        $usernameFromCookie = $_COOKIE['loggedInUser'];
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Yeloo | Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">

    <link rel="shortcut icon" type="image/png" href="img/logo_punjenje_unutra.png" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/contact.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="js/login.js"></script>
</head>

<body>
<header class="container">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container" id="headerNav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="headerLogo" href="homepage.php"><img src="img/logo_yeloo.png" alt="logo3" width="170" height="65"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right" style="margin-top: 0.7%;">
                    <!--<li>
                        <a href="#">About</a>
                    </li> -->
                    <li>
                        <a href="#">Contact</a>
                    </li>
                    <li>
                        <a href="products.php?category=all">All products</a>
                    </li>
                    <li>
                        <?php GenerateLogin(); ?>
                    </li>
                    <!--<li>
                        <a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a>
                    </li>
                    <li>
                        <a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a>
                    </li> -->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
</header>
<!-- <img class="" id="backgroundPic" src="img/background7.jpg" alt=""> -->
<!-- Page Content -->
<div class="container" id="mainContainer" style="z-index: 2;">

    <div class="row" style="margin-top: 50px; padding-bottom: 3%">
        <br>
        <h2>Please enter credentials to log in...</h2>
        <br>
        <form action = "<?php echo $_SERVER['PHP_SELF'];?>">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" class="form-control" id="username" placeholder="Enter username" value="<?php echo $usernameFromCookie?>">
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" name="password" class="form-control" id="pwd" placeholder="Enter password">
            </div>
            <div class="checkbox">
                <label><input type="checkbox" id="rememberMe" name="rememberMe"> Remember me</label>
            </div>
            <button type="submit" class="btn btn-default" id="submit">Submit</button>
        </form>
        <div class="col-sm-5">

        </div>

        <div class=" col-sm-7" id="contactInfo">

        </div>
    </div>

</div>
<!-- /.container -->

<div class="container" id="footerContainer">

    <!-- <hr>

    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12" id="copyrightsDiv">
                <!--<p>Copyright &copy; K. Bruno 2016</p>-->
            </div>
        </div>
    </footer>

</div>
<!-- /.container -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>
