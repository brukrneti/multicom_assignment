$(document).ready(function () {
    GetProducts();
    var productsTable = $('#productsTable').DataTable({
        "order": [],
        "columnDefs": [{
            "targets": 'no-sort',
            "orderable": false
        }]
    });

    //Prevent user to remove input readonly property
    $("#editProductForm input").mouseleave(function () {
        if (!$('#productIDedit').is('[readonly]') ) {
            alert("Removing readonly property is not allowed!\n\nPage will be refreshed after clicking OK.");
            location.reload();
        }
    });
    
    
    var error;
    
    //Check insert form
    $("#newProductForm").submit(function(){
        error = 0;
        $('#newProductForm input').each(function() {
            if ($(this).val().trim() == '') {
                error = 1;
            }
        });

        if (error == 1) {
            alert("All fields must be filled!");
            event.preventDefault()
        }

        var productNameREGEX = /^.{0,45}$/;
        var productDescriptionREGEX = /^.{0,255}$/;
        var productPriceREGEX = /^[1-9]{1}\d{0,2}[.]{1}\d{2}$/;

        if (productNameREGEX.test($("#productNameInput").val())===false) {
            alert("Name must consist of maximum of 45 characters!");
            event.preventDefault();
        }
        if (productDescriptionREGEX.test($("#productDescription").val())===false) {
            alert("Description must consist of maximum of 255 characters!");
            event.preventDefault();
        }
        if (productPriceREGEX.test($("#productPrice").val())===false) {
            alert("Price must be a decimal number!");
            event.preventDefault();
        }
    });

    //Check edit form
    $("#editProductForm").submit(function(){
        error = 0;
        $('#editProductForm input').not("#fileToUploadEdit").each(function() {
            if ($(this).val().trim() == '') {
                error = 1;
            }
        });

        if (error == 1) {
            alert("All fields must be filled!");
            event.preventDefault()
        }

        var productNameREGEX = /^.{0,45}$/;
        var productDescriptionREGEX = /^.{0,255}$/;
        var productPriceREGEX = /^[1-9]{1}\d{0,2}[.]{1}\d{2}$/;

        if (productNameREGEX.test($("#productNameEdit").val())===false) {
            alert("Name must consist of maximum of 45 characters!");
            event.preventDefault();
        }
        if (productDescriptionREGEX.test($("#productDescriptionEdit").val())===false) {
            alert("Description must consist of maximum of 255 characters!");
            event.preventDefault();
        }
        if (productPriceREGEX.test($("#productPriceEdit").val())===false) {
            alert("Price must be a decimal number!");
            event.preventDefault();
        }
    });

    //GET data of product user want to edit
    $("#productsTable").on("click", ".rowToEdit", function(){
        var productID = $(this).data("value");
        GetProductData(productID);
    });
});

function GetProducts() {
    var generatedOutput = "";
    $.ajax({
        url: 'getproducts.php',
        type: 'GET',
        data: {'action': 'getProductsData'},
        dataType: 'json',
        async: false,
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert(textStatus + "  " + errorThrown + "  " + XMLHttpRequest.responseText);
        },
        success: function (data) {
            generatedOutput = "<table id=\"productsTable\" class=\"table table-hover\">";
            generatedOutput += "<thead>"
            generatedOutput += "<tr>";
            generatedOutput += "<th class='no-sort'> </th>";
            generatedOutput += "<th>Name</th>";
            generatedOutput += "<th>Price</th>";
            generatedOutput += "<th>Description</th>";
            generatedOutput += "<th>In stock</th>";
            generatedOutput += "<th>Category</th>";
            generatedOutput += "<th>Status</th>";
            generatedOutput += "<th>Picture</th>";
            generatedOutput += "</tr>";
            generatedOutput += "</thead>"
            generatedOutput += "<tbody>";
            for (var i = 0; i < data.length; i++) {
                generatedOutput += "<tr>";
                //generatedOutput += "<td><input type=\"checkbox\" class=\"checkBox\" value=\"" + data[i].productID + "\"></td>";
                //generatedOutput += "<td><a href=\"#\"><span class=\"glyphicon glyphicon-edit\"></span></a></td>";
                generatedOutput += "<td><a href=\"#\" class=\"rowToEdit\" data-value=\"" + data[i].productID + "\"><span class=\"fa fa-pencil-square-o\" aria-hidden=\"true\" style='color: #333333' data-toggle=\"modal\" data-target=\"#editProductModal\"></span></a></td>";
                generatedOutput += "<td class=\"name\">" + data[i].name + "</td>";
                generatedOutput += "<td class=\"price\">" + data[i].price + "</td>";
                generatedOutput += "<td class=\"description\">" + data[i].description + "</td>";
                generatedOutput += "<td class=\"instock\">" + data[i].inStock + "</td>";
                generatedOutput += "<td class=\"category\">" + data[i].category + "</td>"
                generatedOutput += "<td class=\"status\">" + data[i].status + "</td>";
                generatedOutput += "<td class=\"picture\"><img src=\"" + data[i].path + "/" + data[i].imageName + "." + data[i].format + "\" alt=\"" + data[i].imageName + "\" width=\"50px\" height=\"40px\"></td>";
                generatedOutput += "</tr>";
            }
            generatedOutput += "</tbody>";
            generatedOutput += "</table>";

            $("#contentToShowDiv").html(generatedOutput);
        }
    });
}

function GetProductData (productID) {
    $.ajax({
        url: 'getproducts.php',
        type: 'GET',
        data: {'action': 'getProductToEdit', 'productID': productID},
        dataType: 'json',
        async: false,
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert(textStatus + "  " + errorThrown + "  " + XMLHttpRequest.responseText);
        },
        success: function (data) {
            $("#productIDedit").val(data[0].productID);
            $("#productNameEdit").val(data[0].productName);
            $("#productPriceEdit").val(data[0].price);
            $("#productDescriptionEdit").val(data[0].description);
            $("#productInStockEdit").val(data[0].inStock);
            $("#selectCategoryEdit").val(data[0].categoryID);
            $("#productPictureEdit").html(
                "<label style=\"display: block\">Current picture:     </label>" +
                "<img src=\"" + data[0].path + "/" + data[0].imageName + "." + data[0].format + "\" alt=\"" + data[0].imageName + "\" width=\"200px\" height=\"180px\">"
            );
        }
    });
    $('#productIDedit').prop('readonly', true);
}


