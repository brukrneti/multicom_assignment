<?php
require_once ("functions.php");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["session"])) {  //if session is not created redirect to admin.php
    header("Location: admin.php");
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
$message = "";
if (isset($_GET["success"])) {
    if($_GET["success"]=="1i") {
        $message = "Product successfully inserted!";
    }
    else if($_GET["success"]=="1e") {
        $message = "Product successfully edited!";
    }

    else {
        $message = "Insert/edit failed";
    }
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

    <link href="css/admin_panel.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

    <script src="js/admin.js"></script>
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
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                    <li>
                        <a href="products.php?category=all">All products</a>
                    </li> -->
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
        <h3><?php echo $message?></h3>
        <br>
        <div id="buttonsDiv">
            <div class="col-sm-3">
                <h3 style="margin: 3px;"><strong>Products list:</strong></h3>
            </div>
            <div class="col-sm-9">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-default adminBtn">
                    Delete product
                </button>
                <button type="button" class="btn btn-default adminBtn" data-toggle="modal" data-target="#insertProductModal">
                    New product
                </button>
            </div>
        </div>
        <div id="modalDiv">
            <!-- Modal 1-->
            <div class="modal fade" id="insertProductModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h3 class="modal-title" id="myModalLabel"><strong>Insert new product</strong></h3>
                        </div>
                        <form action="admin_API.php?action=np" enctype="multipart/form-data" method="post" id="newProductForm">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="productNameInput">Name:</label>
                                    <input type="text" name="productNameInput" class="form-control" id="productNameInput">
                                </div>

                                <div class="form-group">
                                    <label for="productPrice">Price:</label>
                                    <input type="text" name="productPrice" class="form-control" id="productPrice">
                                </div>

                                <div class="form-group">
                                    <label for="productDescription">Description:</label>
                                    <input type="text" name="productDescription" class="form-control" id="productDescription">
                                </div>

                                <div class="form-group">
                                    <label for="productInStock">In stock:</label>
                                    <input type="number" name="productInStock" class="form-control" id="productInStock" value="1">
                                </div>

                                <div class="form-group">
                                    <label for="productCategory">Category:</label>
                                    <select class="form-control" id="selectCategory" name="productCategory">
                                        <option value="1">Ornaments</option>
                                        <option value="2">3D puzzles</option>
                                        <option value="3">Bowls</option>
                                        <option value="4">Pads</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="fileToUpload">Image:</label>
                                    <input id="fileToUpload" type="file" name="fileToUpload" class="btn-default"/>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-default" value="Save" name="submit"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal 2-->
            <div class="modal fade" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h3 class="modal-title" id="myModalLabel"><strong>Edit product</strong></h3>
                        </div>
                        <form action="admin_API.php?action=ep" enctype="multipart/form-data" method="post" id="editProductForm">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="productIDedit">Product ID:</label>
                                    <input type="text" name="productIDedit" class="form-control" id="productIDedit">
                                </div>
                                
                                <div class="form-group">
                                    <label for="productNameInput">Name:</label>
                                    <input type="text" name="productNameInput" class="form-control" id="productNameEdit">
                                </div>

                                <div class="form-group">
                                    <label for="productPrice">Price:</label>
                                    <input type="text" name="productPrice" class="form-control" id="productPriceEdit">
                                </div>

                                <div class="form-group">
                                    <label for="productDescription">Description:</label>
                                    <input type="text" name="productDescription" class="form-control" id="productDescriptionEdit">
                                </div>

                                <div class="form-group">
                                    <label for="productInStock">In stock:</label>
                                    <input type="number" name="productInStock" class="form-control" id="productInStockEdit" value="1">
                                </div>

                                <div class="form-group">
                                    <label for="productCategory">Category:</label>
                                    <select class="form-control" id="selectCategoryEdit" name="productCategory">
                                        <option value="1">Ornaments</option>
                                        <option value="2">3D puzzles</option>
                                        <option value="3">Bowls</option>
                                        <option value="4">Pads</option>
                                    </select>
                                </div>
                                <div class="form-group" id="productPictureEdit">
                                    
                                </div>
                                <div class="form-group">
                                    <!--<label for="fileToUpload">Image:</label>-->
                                    Change picture<input id="fileToUploadEdit" type="file" name="fileToUpload" class="btn-default"/>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-default" value="Save" name="submit"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <div id="contentToShowDiv" class="col-sm-12">

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
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<!--
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt-1.10.13/jqc-1.11.3,dt-1.10.13,b-1.2.4,se-1.2.1/datatables.min.css"/>
<link rel="stylesheet" type="text/css" href="Editor-1.6.1/css/editor.dataTables.css">

<script type="text/javascript" src="https://cdn.datatables.net/r/dt-1.10.13/jqc-1.11.3,dt-1.10.13,b-1.2.4,se-1.2.1/datatables.min.js"></script>
<script type="text/javascript" src="Editor-1.6.1/js/dataTables.editor.js"></script> -->

</body>

</html>
