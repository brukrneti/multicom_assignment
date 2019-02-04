<?php
    require ("database_class.php");
    require_once ("products_class.php");

    if (session_status() == PHP_SESSION_NONE) { //start session only if it's not already started
        session_start();
    }

    if (!isset($_SESSION["session"])) {
        header("Location: login.php");
        exit();
    }

    $db = new Database();
    $db->ConnectDB();

    if ($db->ErrorDB()) {
        $msg .= "Connecting to database failed!";
        $failed = true;
    }

    if (isset($_GET["fileName"])) {
        $fileName = $_GET["fileName"];
        $xml = new SimpleXMLElement("uploads/$fileName", NULL, TRUE);

        foreach ($xml->new_products->product as $product) {
            $insertQuery = "INSERT INTO products VALUES (default, '$product->name', '$product->code', '$product->description', '$product->price', CURDATE(), default)";
            $db->UpdateDB($insertQuery);
        }
        header("Location: offers.php?action=success");
    }

    $db->DisconnectDB();
?>