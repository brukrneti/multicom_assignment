<?php
    require_once('database_class.php');
    require_once ('users_class.php');

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    //connecting to database
    $db = new Database();
    $db->ConnectDB();
    
    if ($db->ErrorDB()) {
        $msg = "Connecting to database failed!";
        $error = true;
    }
    
    //iz baze dohvatiti proizvode i viditi koliko ih ima. ovisno o tome, napraviti ispis proizvoda. Može AJAX ili PHP.
    //paziti da je status proizvoda created a ne deleted ili nešto te da je instock veći od nule
    
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
            //echo "<a href=\"login.php\"><span class=\"glyphicon glyphicon-log-in\"></span> Login</a>";
        }
    }

?>