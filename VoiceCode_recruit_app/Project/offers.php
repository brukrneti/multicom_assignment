<?php
    require_once ("users_class.php");
    require_once ("functions.php");
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (isset($_GET["logout"])) {
        $logout = $_GET["logout"];
        if ($logout == 'true') {
            unset($_SESSION["session"]);
            session_destroy();
            header('Location: login.php');
        }
    }

    else if (!isset($_SESSION["session"])) {
        header("Location: login.php");
        exit();
    }

    if (isset($_FILES["fileToUpload"])) {
        $name = $_FILES["fileToUpload"]["name"];
        $tmp_name = $_FILES['fileToUpload']['tmp_name'];
        $location = 'uploads/';
        move_uploaded_file($tmp_name, $location.$name);
        header("Location: file_upload.php?fileName=$name");
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

    <title>Offers</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/main.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <!--test123
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>-->

    <script src="js/offers.js"></script>

    <!--TESTNE SKRIPTE-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
    <!--<script type="text/javascript" src="js/bootstrap-filestyle.min.js"> </script>-->

    <!--CSS za popup -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style>
        label, input { display:block; }
        input.text { margin-bottom:12px; width:95%; padding: .3em; }
        fieldset {
            padding:15px;
            border: 2px solid;
            margin-top:25px;
            border-radius: 2px;
            border-style: inset;
            border-color: initial;
        }
        label {
            margin-top: 3px;
            margin-bottom: 0px;
        }
        #offerForm>input, #offerForm>fieldset>input {
            border-color: #FFFFFF;
            border-style: solid;
            background-color: transparent;
        }
    </style>
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

            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <?php GenerateNavigation(); ?>
                    </li>

                    <li>
                        <?php GenerateLogin(); ?>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
</header>
<!-- Page Content -->
<div class="container" id="">
    <div class="col-lg-6 col-md-6-xs-6 col-sm-6">
        <br>
        <h3>Choose XML document to upload:</h3>
        <br>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data" id="fileUploadForm">
            <div class="row">
                <div class="form-group col-lg-4 col-md-4 col-xs-4 col-sm-4">
                    <input type="file" name="fileToUpload" id="fileToUpload" accept="text/xml">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
                    <button type="submit" class="btn btn-default" id="uploadFile" name="uploadFile" style="width: 100%" value="aaa">Upload</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-lg-6 col-md-6-xs-6 col-sm-6">
        <br>
        <h3 style="display: inline-block; width: 350px;">Products already in database:</h3><input type="button" class="btn btn-default" id="showProductsBtn" style="width: 62px; margin-top: -6px;" value="Show"></button>
        <br>
        <br>
        <div id="showProductsDiv" style="display: none;">
        </div>
    </div>
</div>

<div class="container">
    <!--<div class="col-lg-6 col-md-6-xs-6 col-sm-6">
        <br>
        <h3>Enter code to fetch related offer:</h3>
        <br>
        <form id="getOfferForm">
            <div class="row">
                <div class="form-group col-lg-12 col-md-12 col-xs-12 col-sm-12">
                    <input type="text" name="codeInputField" id="codeInputField" placeholder="Enter offer code" style="width: 80%; border-radius: 2px">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                    <button type="button" class="btn btn-default" id="fetchOfferBtn" name="fetchOfferBtn" style="width: 80%">Get offer</button>
                </div>
            </div>
        </form>
    </div>-->
    <?php GenerateOffersDiv(); ?>
    <div id="popUpOffer" class="col-lg-6 col-md-6 col-xs-6 col-sm-6" style="width: 400px;">

    </div>
</div>
<br>
<!-- /.container -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>
