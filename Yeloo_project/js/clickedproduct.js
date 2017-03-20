$(document).ready(function() {
    //DisplayProduct(); //FUNCTION FOR XMLHTTP REQUEST SOLUTION
    DisplayProductAJAX();
});

function ParseURLParameters () {
    var parametersAndValues = window.location.search.substring(1);
    var allURLParameters = parametersAndValues.split('&'); //split two parameters
    var value = allURLParameters[0].split('=')             //get value of first one (name)
    var productName = value[1];
    while (productName.includes("%20")) {
        productName = productName.replace("%20", " ");
    }

    return productName;
}

/*
function DisplayProduct() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            $("#displayProductDiv").html(xmlhttp.responseText);
        }
    };
    xmlhttp.open("GET", "getproducts.php?name=" + ParseURLParameters() + "&action=displayByProduct", true); //zovem php skriptu i echo iz nje se sada nalazi u responseText
    xmlhttp.send();
}*/

//FUNCTION FOR AJAX SOLUTION
function DisplayProductAJAX() {
    $.ajax({
        url: 'getproducts.php',
        type: 'GET',
        data: {'name': ParseURLParameters(), 'action': 'displayByProduct'},
        dataType: 'json',
        async: false,
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert(textStatus +"  "+ errorThrown + "  " + XMLHttpRequest.responseText);
        },
        success: function (data) {
            var generatedOutput;

            generatedOutput = "<div class=\"col-sm-8 col-lg-8 col-md-8\" style=\"height: 35vw\">";
            generatedOutput += "<img src=\"" + data[0].path + "/" + data[0].imageName + "." + data[0].format + "\" alt=\"" + data[0].imageName + "\" width=\"100%\" height=\"100%\">";
            generatedOutput += "</div>";
            generatedOutput += "<div class=\"col-sm-4 col-lg-4 col-md-4\">";
            generatedOutput += "<h2 id=\"productName\" style=\"margin-top: 0px\">";
            generatedOutput += "<strong>" + data[0].productName + "</strong>";
            generatedOutput += "</h2><br>";
            //generatedOutput += "<p class=\"priceAndInStock\"><strong>Price: " + data[0].price + "€</strong></p>";
            generatedOutput += "<p class=\"priceAndInStock\"><strong>In stock: " + data[0].inStock + "</strong></p>";
            generatedOutput += "<p class=\"priceAndInStock\"><strong>Description:</strong></p>";
            generatedOutput += "<p style=\"text-align: justify\">" + data[0].description + "</p>";
            generatedOutput += "</div>";
            
            $("#displayProductDiv").html(generatedOutput);
        }
    });
}