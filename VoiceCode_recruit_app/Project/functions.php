<?php
    require_once ("users_class.php");
    require_once ("database_class.php");
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    function GenerateLogin () {
        if (isset($_SESSION["session"])) { //fetch logged in username and usertype
            $sessionObject = $_SESSION["session"];
            $loggedInUser = $sessionObject->ReturnUsername();

            $output = "<div class=\"dropdown\" style=\"float:right;\">";
            $output .= "<button class=\"dropbtn\">$loggedInUser</button>";
            $output .= "<div class=\"dropdown-content\">";
            $output .= "<a href=\"" . $_SERVER['PHP_SELF'] . "?logout=true\">Log out</a>";
            $output .= "</div>";
            $output .= "</div>";

            echo $output;
        }

        else {
            echo "<a href=\"login.php\"><span class=\"glyphicon glyphicon-log-in\"></span> Login</a>";
        }
    }

    function GenerateNavigation () {
        if (isset($_SESSION["session"])) { //fetch logged in username and usertype
            $output = "<button class=\"navLinks\">";
            $output .= "<a class=\"navLinksChild\" href=\"offers.php\">Offers</a>";
            $output .= "</button>";

            echo $output;
        }
    }

    function GenerateOffersDiv () {
        if (isset($_SESSION["session"])) {
            $objectFromSession = $_SESSION["session"];
            $loggedUserType = $objectFromSession->ReturnUserType();
            if ($loggedUserType == "salesman") {
                $output = "";
            }
            else {
                $output = "<div class=\"col-lg-6 col-md-6-xs-6 col-sm-6\">";
                $output .= "<h3>Enter code to fetch related offer:</h3>";
                $output .= "<br>";
                $output .= "<form id=\"getOfferForm\">";
                $output .= "<div class=\"row\">";
                $output .= "<div class=\"form-group col-lg-12 col-md-12 col-xs-12 col-sm-12\">";
                $output .= "<input type=\"text\" name=\"codeInputField\" id=\"codeInputField\" placeholder=\"Enter offer code\" style=\"width: 80%; border-radius: 2px\">";
                $output .= "</div></div>";
                $output .= "<div class=\"row\">";
                $output .= "<div class=\"col-lg-12 col-md-12 col-xs-12 col-sm-12\">";
                $output .= "<button type=\"button\" class=\"btn btn-default\" id=\"fetchOfferBtn\" name=\"fetchOfferBtn\" style=\"width: 80%\">Get offer</button>";
                $output .= "</div>";
                $output .= "</div>";
                $output .= "</form>";
                $output .= "</div>";
            }
            echo $output;
        }
    }
?>