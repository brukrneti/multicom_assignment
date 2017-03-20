<?php
    require_once('database_class.php');

    //connecting to database
    $db = new Database();
    $db->ConnectDB();

    if ($db->ErrorDB()) {
        $msg = "Connecting to database failed!";
        $error = true;
    }

    //iz baze dohvatiti proizvode i viditi koliko ih ima. ovisno o tome, napraviti ispis proizvoda. Može AJAX ili PHP.
    //paziti da je status proizvoda created a ne deleted ili nešto te da je instock veći od nule


    $selectedCategory = '';
    $action = '';
    $name = '';
    $output = array();
    //GET URL parameters
    if (isset($_GET["selectedCategory"])) {
        $selectedCategory = $_GET["selectedCategory"];
    }
    if (isset($_GET["action"])) {
        $action = $_GET["action"];
    }
    if (isset($_GET["name"])) {
        $name = $_GET["name"];
    }
    //Get products by category
    if ($action == "displayByCategory") {
        //Get all products
        if ($selectedCategory != "all") {
            //dohvaćanje svih proizvoda - neiskorišteno
            $getProductsQuery = $db->SelectDB("SELECT * FROM products WHERE products.categoryID=(SELECT categoryID FROM productcategories WHERE productcategories.name='$selectedCategory')");
            //dohvaćanje proizvoda sa svojom slikom
            $getProdAndImgQuery = $db->SelectDB("SELECT products.name AS productName, price, description, inStock, images.name AS imageName, size, format, path FROM products, images WHERE products.categoryID=(SELECT categoryID FROM productcategories WHERE productcategories.name='$selectedCategory') AND products.productID=images.product  AND products.status='created'");

            //$output = array();
            while ($productsWithImages = $getProdAndImgQuery->fetch_assoc()) {
                //while ($productsWithImages = $getProductsQuery->fetch_assoc()) {
                $output[] = $productsWithImages;
            }
        }
        //Get products from selected category
        else if ($selectedCategory == "all") {
            $getAllProdAndImgQuery = $db->SelectDB("SELECT products.name AS productName, price, description, inStock, images.name AS imageName, size, format, path FROM products, images WHERE products.productID=images.product  AND products.status='created'");

            //$output = array();
            while ($allProductsWithImages = $getAllProdAndImgQuery->fetch_assoc()) {
                $output[] = $allProductsWithImages;
            }
        }
    }

    //Get selected product
    else if ($action == "displayByProduct") {
        $getSelectedProductQuery = $db->SelectDB("SELECT products.name AS productName, price, description, inStock, images.name AS imageName, size, format, path FROM products, images WHERE products.name='$name' AND products.productID=images.product");
        $output[] = $getSelectedProductQuery->fetch_assoc(); //USING JSON FOR AJAX
        
        /* NO AJAX - EVERYTHING FORMED IN PHP, USING XMLHTTP REQUEST
        $data = $getSelectedProductQuery->fetch_assoc();

        //xmlhttp request
        $output2 = "<div class=\"col-sm-8 col-lg-8 col-md-8\" style=\"height: 90%\">";
        $output2 .= "<img src=\"" . $data['path'] . "/" . $data['imageName'] . "." . $data['format'] . "\" alt=\"" . $data['imageName'] . "\" width=\"100%\" height=\"100%\">";
        $output2 .= "</div>";
        $output2 .= "<div class=\"col-sm-4 col-lg-4 col-md-4\">";
        $output2 .= "<h2 id=\"productName\" style=\"margin-top: 0px\">";
        $output2 .= "<strong>" . $data['productName'] . "</strong>";
        $output2 .= "</h2><br>";
        $output2 .= "<p class=\"priceAndInStock\"><strong>Price: " . $data['price'] . "€</strong></p>";
        $output2 .= "<p class=\"priceAndInStock\"><strong>In stock: " . $data['inStock'] . "</strong></p><br>";
        $output2 .= "<p style=\"text-align: justify\">" . $data['description'] . "</p>";
        $output2 .= "</div>";

        echo $output2;

        exit;*/
    }

    else if ($action == "getProductsData") {
        $getProductsDataQuery = $db->SelectDB("SELECT productID, products.name, price, description, inStock, productcategories.name AS category, products.status, i.name as imageName, i.format, i.path FROM products JOIN  productcategories USING (categoryID) JOIN images i ON (products.productID=i.product)");
        while ($productsData = $getProductsDataQuery->fetch_assoc()) {
            $output[] = $productsData;
        }
    }

    else if ($action == "getProductToEdit") {
        if (isset($_GET["productID"])) {
            $productID = $_GET["productID"];

            $getProductToEditQuery = $db->SelectDB("SELECT productID, p.name AS productName, price, description, inStock, categoryID , i.name as imageName, i.format, i.path FROM products p JOIN  images i ON (p.productID=i.product) WHERE p.productID=$productID");
            while ($productData = $getProductToEditQuery->fetch_assoc()) {
                $output[] = $productData;
            }
        }
    }

    //encode JSON
    header('Content-Type: application/json');
    print json_encode($output);
    
    //Disconnecting from database...
    $db->DisconnectDB();
?>