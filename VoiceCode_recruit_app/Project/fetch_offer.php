<?php
    if (session_status() == PHP_SESSION_NONE) { //start session only if it's not already started
        session_start();
    }

    if (!isset($_SESSION["session"])) {
        header("Location: login.php");
        exit();
    }

    else {
        if (isset($_GET["offerCode"])) {
            $code = $_GET["offerCode"];
            $api = file_get_contents("http://voicecode.hr/api/offer?code=$code");
            echo $api;
            exit();
        }
    }

?>