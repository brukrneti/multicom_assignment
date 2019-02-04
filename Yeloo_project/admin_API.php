<?php
    require_once ("database_class.php");
    
    $db = new Database();
    $db->ConnectDB();
    
    if ($db->ErrorDB()) {
        $msg = "Connecting to database failed!";
        $error = true;
    }

    if (isset($_POST["submit"])) {
        if (isset($_GET["action"])) {
            $action = $_GET["action"];

            $productName = $_POST["productNameInput"];
            $productPrice = $_POST["productPrice"];
            $productDescription = $_POST["productDescription"];
            $productInStock = $_POST["productInStock"];
            $productCategory = $_POST["productCategory"];

            //Picture related
            if (isset($_FILES["fileToUpload"])) {
                $name = $_FILES["fileToUpload"]["name"];
                $tmp_name = $_FILES['fileToUpload']['tmp_name'];
                $location = 'img/';
                move_uploaded_file($tmp_name, $location.$name);

                $fileSize = filesize("img/" . $name);

                $nameAndExtensionArray = explode(".", $name);

                $nameWithoutExtension = $nameAndExtensionArray[0];
                $extensionWithoutName = $nameAndExtensionArray[1];
            }


            if ($action == "np") {
                $db->UpdateDB("INSERT INTO products VALUES (default, '$productName', $productPrice, '$productDescription', $productInStock, $productCategory, default)");

                //Get last inserted product to attach photo to
                $lastInsertedProductQuery = $db->SelectDB("SELECT MAX(productID) FROM products");
                $lastInsertedProductArray = $lastInsertedProductQuery -> fetch_array();
                $productID = $lastInsertedProductArray[0];

                $db->UpdateDB("INSERT INTO images VALUES (default, '$nameWithoutExtension', '$extensionWithoutName', '$fileSize', 'img', $productID);");
                header ("Location: admin_panel.php?success=1i");
            }

            else if ($action == "ep") {
                if (isset($_POST["productIDedit"])) {
                    $productIDEdit = $_POST["productIDedit"];
                }
                $db->UpdateDB("UPDATE products SET name='$productName', price=$productPrice, description='$productDescription', inStock=$productInStock, categoryID=$productCategory WHERE productID=$productIDEdit");
                //Remove previous picture from directory
                $imageDetailsQuery = $db->SelectDB("SELECT name, format, path FROM images WHERE product=$productIDEdit");
                $imageDetailsArray = $imageDetailsQuery -> fetch_array();
                $deletePath = $imageDetailsArray[2] . "/" . $imageDetailsArray[0] . "." . $imageDetailsArray[1];
                //Attach new picture to product if one is uploaded
                if ($_FILES["fileToUpload"]["name"] != "") {
                    if ($name != ($imageDetailsArray[0] . "." . $imageDetailsArray[1])) { //u slučaju da korinsik uploada sliku koja već je gore
                        unlink ($deletePath);
                    }
                    $db->UpdateDB("UPDATE images SET name='$nameWithoutExtension', format='$extensionWithoutName', size=$fileSize WHERE product=$productIDEdit");
                }
                header ("Location: admin_panel.php?success=1e");
            }
        }
    }

    else {
        header ("Location: admin_panel.php?success=0");
    }
    
    $db->DisconnectDB();

?>