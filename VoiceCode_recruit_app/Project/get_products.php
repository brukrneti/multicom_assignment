<?php
    require_once('database_class.php');

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (!isset($_SESSION["session"])) {
        header("Location: login.php");
        exit();
    }
    //connecting to database
    $db = new Database();
    $db->ConnectDB();

    if ($db->ErrorDB()) {
        $msg = "Connecting to database failed!";
        $error = true;
    }

    $getProductsQuery = $db->SelectDB("SELECT name FROM products;");

    while ($allProducts = $getProductsQuery->fetch_assoc()) {
        $output[] = $allProducts;
    }

    //encode JSON
    header('Content-Type: application/json');
    print json_encode($output);

    //Disconnecting from database...
    $db->DisconnectDB();
?>