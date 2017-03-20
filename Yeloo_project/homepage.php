<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Yeloo | Homepage</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">

    <link rel="shortcut icon" type="image/png" href="img/logo_punjenje_unutra.png" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        h4>a {
            font-size: 16px;
        }
    </style>
</head>
<img class="" id="backgroundPic" src="img/background7.jpg" alt="">
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
                <!--<a class="navbar-brand" href="index.html">Home</a> -->
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right" style="margin-top: 0.7%;"> <!-- maknut ovo margin 0.7 za dobit tanji header-->
                    <!--<li>
                        <a href="#">About</a>
                    </li> -->
                    <li>
                        <a href="contact.html">Contact</a>
                    </li>
                    <li>
                        <a href="products.php?category=all">All products</a>
                    </li>
                    <!-- <li>
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

<!-- Page Content -->
<div class="container" id="mainContainer" style="z-index: 2;">

    <div class="row" style="margin-top: 50px;">

        <div class="col-md-9" id="contentWrapper">

            <div class="row carousel-holder">

                <div class="col-md-12" id="carouselWrapper">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="item active">
                                <img class="slide-image" src="img/decoration_wrenchbrown.JPG" alt="" width="800" height="500">
                            </div>
                            <div class="item">
                                <img class="slide-image" src="img/pads_leafs.JPG" alt="" width="800" height="500">
                            </div>
                            <div class="item">
                                <img class="slide-image" src="img/3dpuzzle_apple.JPG" alt="" width="800" height="500">
                            </div>
                            <div class="item">
                                <img class="slide-image" src="img/bowls_with_pad.JPG" alt="" width="800" height="500">
                            </div>
                        </div>
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                    </div>
                </div>

            </div>

            <!-- TEST vertikalno-->
            <div class="col-lg-3 col-sm-3">
                <div>
                    <h2>
                        Ornaments
                    </h2>
                </div>

                <div class="thumbnail">
                    <a class="anchorProducts" href="clickedproduct.php?name=Small%20Bicycle&action=displayByProduct">
                    <img src="img/decoration_small_bicycle.JPG" alt="small_bike" class="img-responsive" width="200px" height="200">
                    <div class="caption">
                        <!--<h4 class="pull-right">$24.99</h4>-->
                        <h4>
                            Small Bicycle
                        </h4>
                    </div>
                    </a>
                </div>
                <!--
                <div class="thumbnail">
                    <img src="img/decoration_2leafs.JPG" alt="2leafs">
                    <div class="caption">
                        <!--<h4 class="pull-right">$24.99</h4>--
                        <h4><a href="clickedproduct.php?name=Two Leafs&action=displayByProduct">Two Leafs</a>
                        </h4>
                    </div>
                </div>

                <div class="thumbnail">
                    <img src="img/decoration_small_guitar.JPG" alt="guitar">
                    <div class="caption">
                        <!--<h4 class="pull-right">$24.99</h4>--
                        <h4><a href="clickedproduct.php?name=Guitar Ornament&action=displayByProduct">Guitar Ornament</a>
                        </h4>
                    </div>
                </div>

                <div class="thumbnail">
                    <img src="img/decoration_cut_leaf.JPG" alt="cutleaf">
                    <div class="caption">
                        <!--<h4 class="pull-right">$24.99</h4>--
                        <h4><a href="clickedproduct.php?name=Cut Leaf&action=displayByProduct">Cut Leaf</a>
                        </h4>
                    </div>
                </div> -->

                <div class="col-sm-12 col-lg-12 col-md-12" style="text-align:center">
                    <a href="products.php?category=ornaments&action=displayByCategory" class="btn btn-default" role="button">
                        View all
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-3">
                <div>
                    <h2>
                        3D puzzles
                    </h2>
                </div>

                <div class="thumbnail">
                    <a class="anchorProducts" href="clickedproduct.php?name=3D Foot Puzzle&action=displayByProduct">
                        <img src="img/3dpuzzle_foot.JPG" alt="foot">
                        <div class="caption">
                            <!--<h4 class="pull-right">$24.99</h4>-->
                            <h4>
                                3D Foot Puzzle
                            </h4>
                        </div>
                    </a>
                </div>
                <!--
                <div class="thumbnail">
                    <img src="img/3dpuzzle_maple_leaf.JPG" alt="mapleleaf">
                    <div class="caption">
                        <!--<h4 class="pull-right">$24.99</h4>--
                        <h4><a href="clickedproduct.php?name=3D Maple Leaf Puzzle&action=displayByProduct">3D Maple Leaf Puzzle</a>
                        </h4>
                    </div>
                </div>

                <div class="thumbnail">
                    <img src="img/3dpuzzle_grapevine.JPG" alt="grapevine3d">
                    <div class="caption">
                        <!--<h4 class="pull-right">$24.99</h4>--
                        <h4><a href="clickedproduct.php?name=3D Grapevine Leaf Puzzle&action=displayByProduct">3D Grapevine Leaf Puzzle</a>
                        </h4>
                    </div>
                </div>

                <div class="thumbnail">
                    <img src="img/3dpuzzle_triangle.JPG" alt="trianglepuzzle">
                    <div class="caption">
                        <!--<h4 class="pull-right">$24.99</h4>--
                        <h4><a href="clickedproduct.php?name=3D Triangle Puzzle&action=displayByProduct">3D Triangle Puzzle</a>
                        </h4>
                    </div>
                </div> -->

                <div class="col-sm-12 col-lg-12 col-md-12" style="text-align:center">
                    <a href="products.php?category=3dpuzzles&action=displayByCategory" class="btn btn-default" role="button">
                        View all
                    </a>
                </div>

            </div>
            <div class="col-lg-3 col-sm-3">
                <div>
                    <h2>
                        Bowls
                    </h2>
                </div>

                <div class="thumbnail">
                    <a class="anchorProducts" href="clickedproduct.php?name=Maple Leaf Shaped Bowl 3&action=displayByProduct">
                        <img src="img/bowls_maple_leaf1.JPG" alt="posuda1">
                        <div class="caption">
                            <!--<h4 class="pull-right">$24.99</h4>-->
                            <h4>
                                Maple Leaf Shaped Bowl 3
                            </h4>
                        </div>
                    </a>
                </div>
                <!--
                <div class="thumbnail">
                    <img src="img/bowls_2leaf_deco.JPG" alt="posuda2">
                    <div class="caption">
                        <!--<h4 class="pull-right">$24.99</h4>--
                        <h4><a href="clickedproduct.php?name=2-Leaf Decorated Bowl&action=displayByProduct">2-Leaf Decorated Bowl</a>
                        </h4>
                    </div>
                </div>

                <div class="thumbnail">
                    <img src="img/bowls_guitar.JPG" alt="posuda3">
                    <div class="caption">
                        <!--<h4 class="pull-right">$24.99</h4>--
                        <h4><a href="clickedproduct.php?name=Guitar Shaped Bowl&action=displayByProduct">Guitar Shaped Bowl</a>
                        </h4>
                    </div>
                </div>

                <div class="thumbnail">
                    <img src="img/bowls_2leaf.JPG" alt="bowl2leafs">
                    <div class="caption">
                        <!--<h4 class="pull-right">$24.99</h4>--
                        <h4><a href="clickedproduct.php?name=Bowl Two Leafs&action=displayByProduct">Bowl Two Leafs</a>
                        </h4>
                    </div>
                </div> -->

                <div class="col-sm-12 col-lg-12 col-md-12" style="text-align:center">
                    <a href="products.php?category=bowls&action=displayByCategory" class="btn btn-default" role="button">
                        View all
                    </a>
                </div>

            </div>
            <div class="col-lg-3 col-sm-3">
                <div>
                    <h2>
                        Pads
                    </h2>
                </div>
                <!--
                <div class="thumbnail">
                    <img src="img/pads_smile.JPG" alt="podmetac1">
                    <div class="caption">
                        <!--<h4 class="pull-right">$24.99</h4>--
                        <h4><a href="clickedproduct.php?name=Smile%20Pad&action=displayByProduct">Smile Pad</a>
                        </h4>
                    </div>
                </div>

                <div class="thumbnail">
                    <img src="img/pads_leaf_decoration_pad2.JPG" alt="podmetac2">
                    <div class="caption">
                        <!--<h4 class="pull-right">$24.99</h4>--
                        <h4><a href="clickedproduct.php?name=Pad With Leaf Decoration 2&action=displayByProduct">Pad With Leaf Decoration 2</a>
                        </h4>
                    </div>
                </div>

                <div class="thumbnail">
                    <img src="img/pads_4part_puzzle.JPG" alt="podmetac3">
                    <div class="caption">
                        <!--<h4 class="pull-right">$24.99</h4>--
                        <h4><a href="clickedproduct.php?name=4-Part Puzzle Pad&action=displayByProduct">4-Part Puzzle Pad</a>
                        </h4>
                    </div>
                </div> -->

                <div class="thumbnail">
                    <a class="anchorProducts" href="clickedproduct.php?name=Large Oak Leaf Shaped Pad&action=displayByProduct">
                        <img src="img/pads_large_oak_leaf.JPG" alt="podmetac4">
                        <div class="caption">
                            <!--<h4 class="pull-right">$24.99</h4>-->
                            <h4>
                                Large Oak Leaf Shaped Pad
                            </h4>
                        </div>
                    </a>
                </div>

                <div class="col-sm-12 col-lg-12 col-md-12" style="text-align:center">
                    <a href="products.php?category=pads&action=displayByCategory" class="btn btn-default" role="button">
                        View all
                    </a>
                </div>
            </div>
            <!-- TEST vertikalno-->

            <!-- Horizontalno...
            <div class="row">

                <div class="col-sm-12 col-lg-12 col-md-12">
                    <h2>
                        Ornaments
                    </h2>
                </div>

                <div class="col-sm-3 col-lg-3 col-md-3">
                    <div class="thumbnail">
                        <img src="img/ukras6.jpg" alt="ukras6" class="img-responsive" width="200px" height="200">
                        <div class="caption">
                            <h4><a href="clickedproduct.php?name=ukras6&action=displayByProduct">ukras6</a></h4>
                            <h5>$74.99</h5>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3 col-lg-3 col-md-3">
                    <div class="thumbnail">
                        <img src="img/ukras5.jpg" alt="ukras5">
                        <div class="caption">
                            <h4 class="pull-right">$24.99</h4>
                            <h4><a href="#">Naziv prizvoda</a>
                            </h4>
                            <p>Kratak opis</a>.</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3 col-lg-3 col-md-3">
                    <div class="thumbnail">
                        <img src="img/ukras7.jpg" alt="ukras7">
                        <div class="caption">
                            <h4 class="pull-right">$64.99</h4>
                            <h4><a href="#">Naziv prizvoda</a>
                            </h4>
                            <p>Kratak opis</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3 col-lg-3 col-md-3">
                    <div class="thumbnail">
                        <img src="img/ukras8.jpg" alt="ukras8">
                        <div class="caption">
                            <h4 class="pull-right">$74.99</h4>
                            <h4><a href="#">Naziv prizvoda</a>
                            </h4>
                            <p>Kratak opis</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-lg-12 col-md-12" style="text-align:center">
                    <a href="products.php?category=ornaments&action=displayByCategory" class="btn btn-default" role="button">
                        View all
                    </a>
                </div>

            </div>

            <div class="row">

                <div class="col-sm-12 col-lg-12 col-md-12">
                    <h2>
                        3D puzzles
                    </h2>
                </div>

                <div class="col-sm-3 col-lg-3 col-md-3">
                    <div class="thumbnail">
                        <img src="img/3Dpuzla1.jpg" alt="igracka1">
                        <div class="caption">
                            <h4 class="pull-right">$24.99</h4>
                            <h4><a href="#">Naziv prizvoda</a>
                            </h4>
                            <p>Kratak opis</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3 col-lg-3 col-md-3">
                    <div class="thumbnail">
                        <img src="img/3Dpuzla2.jpg" alt="igracka2">
                        <div class="caption">
                            <h4 class="pull-right">$24.99</h4>
                            <h4><a href="#">Naziv proizvoda</a>
                            </h4>
                            <p>Kratak opis</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3 col-lg-3 col-md-3">
                    <div class="thumbnail">
                        <img src="img/3Dpuzla3.jpg" alt="igracka3">
                        <div class="caption">
                            <h4 class="pull-right">$64.99</h4>
                            <h4><a href="#">Naziv prizvoda</a>
                            </h4>
                            <p>Kratak opis</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3 col-lg-3 col-md-3">
                    <div class="thumbnail">
                        <img src="img/3Dpuzla4.jpg" alt="igracka4">
                        <div class="caption">
                            <h4 class="pull-right">$74.99</h4>
                            <h4><a href="#">Naziv proizvoda</a>
                            </h4>
                            <p>Kratak opis</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-lg-12 col-md-12" style="text-align:center">
                    <a href="products.php?category=toys&action=displayByCategory" class="btn btn-default" role="button">
                        View all
                    </a>
                </div>

            </div>

            <div class="row">

                <div class="col-sm-12 col-lg-12 col-md-12">
                    <h2>
                        Bowls
                    </h2>
                </div>

                <div class="col-sm-3 col-lg-3 col-md-3">
                    <div class="thumbnail">
                        <img src="img/posuda1.jpg" alt="posuda1">
                        <div class="caption">
                            <h4 class="pull-right">$84.99</h4>
                            <h4><a href="#">Naziv prizvoda</a>
                            </h4>
                            <p>Kratak opis</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3 col-lg-3 col-md-3">
                    <div class="thumbnail">
                        <img src="img/posuda2.jpg" alt="posuda2">
                        <div class="caption">
                            <h4 class="pull-right">$84.99</h4>
                            <h4><a href="#">Naziv prizvoda</a>
                            </h4>
                            <p>Kratak opis</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3 col-lg-3 col-md-3">
                    <div class="thumbnail">
                        <img src="img/posuda3.jpg" alt="posuda3">
                        <div class="caption">
                            <h4 class="pull-right">$94.99</h4>
                            <h4><a href="#">Naziv prizvoda</a>
                            </h4>
                            <p>Kratak opis</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3 col-lg-3 col-md-3">
                    <div class="thumbnail">
                        <img src="img/podmetac1.jpg" alt="podmetac1">
                        <div class="caption">
                            <h4 class="pull-right">$94.99</h4>
                            <h4><a href="#">Naziv prizvoda</a>
                            </h4>
                            <p>Kratak opis</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-lg-12 col-md-12" style="text-align:center">
                    <a href="products.php?category=bowls&action=displayByCategory" class="btn btn-default" role="button">
                        View all
                    </a>
                </div>
            </div>
            <div class="row">

                <div class="col-sm-12 col-lg-12 col-md-12">
                    <h2>
                        Pads
                    </h2>
                </div>

                <div class="col-sm-3 col-lg-3 col-md-3">
                    <div class="thumbnail">
                        <img src="img/posuda1.jpg" alt="posuda1">
                        <div class="caption">
                            <h4 class="pull-right">$84.99</h4>
                            <h4><a href="#">Naziv prizvoda</a>
                            </h4>
                            <p>Kratak opis</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3 col-lg-3 col-md-3">
                    <div class="thumbnail">
                        <img src="img/posuda2.jpg" alt="posuda2">
                        <div class="caption">
                            <h4 class="pull-right">$84.99</h4>
                            <h4><a href="#">Naziv prizvoda</a>
                            </h4>
                            <p>Kratak opis</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3 col-lg-3 col-md-3">
                    <div class="thumbnail">
                        <img src="img/posuda3.jpg" alt="posuda3">
                        <div class="caption">
                            <h4 class="pull-right">$94.99</h4>
                            <h4><a href="#">Naziv prizvoda</a>
                            </h4>
                            <p>Kratak opis</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3 col-lg-3 col-md-3">
                    <div class="thumbnail">
                        <img src="img/podmetac1.jpg" alt="podmetac1">
                        <div class="caption">
                            <h4 class="pull-right">$94.99</h4>
                            <h4><a href="#">Naziv prizvoda</a>
                            </h4>
                            <p>Kratak opis</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-lg-12 col-md-12" style="text-align:center">
                    <a href="products.php?category=pads&action=displayByCategory" class="btn btn-default" role="button">
                        View all
                    </a>
                </div>
            </div>
            <!-- /test -->
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
