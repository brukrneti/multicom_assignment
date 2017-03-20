$(document).ready(function() {
    $("#selectCategory").val(ParseURLParameters());
    ShowProductsAjax();
    $('#selectCategory').bind("change select", function() {
        ShowProductsAjax();
    });
});

function ParseURLParameters () {
    var parametersAndValues = window.location.search.substring(1);
    var allURLParameters = parametersAndValues.split('&'); //split two parameters
    var value = allURLParameters[0].split('=')             //get value of first one (category)
    return value[1];
}

function ShowProductsAjax() {
    var selectedCategoryValue = $("#selectCategory").val();
    var selectedCategoryName = $(this).find('option:selected').text();

    $.ajax({
        url: 'getproducts.php',
        type: 'GET',
        data: {'selectedCategory': selectedCategoryValue, 'action': 'displayByCategory'},
        dataType: 'json',
        async: false,
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert(textStatus +"  "+ errorThrown + "  " + XMLHttpRequest.responseText);
        },
        success: function (data) {
            var r = data;
            var generatedOutput;

            generatedOutput = "<div class=\"col-sm-12 col-lg-12 col-md-12\">";
            generatedOutput += "<h2>" + selectedCategoryName + "</h2>";
            generatedOutput += "</div>";
            for(var i = 0; i < r.length; i++) {
                //generatedOutput += "<div class=\"col-sm-3 col-lg-3 col-md-3\"><div class=\"thumbnail\"><img src=\"" + r[i].path + "/" + r[i].imageName + "." + r[i].format + "\" alt=\"" + r[i].imageName + "\"><div class=\"caption\"><h4><a href=\"#\">" + r[i].productName + "</a></h4><h5>$" + r[i].price + "</h5><h5>In stock: " + r[i].inStock + "</h5></div></div></div>";
                generatedOutput += "<div class=\"col-sm-3 col-lg-3 col-md-3\">";
                generatedOutput += "<a class=\"anchorProducts\" href=\"clickedproduct.php?name=" + r[i].productName + "&action=displayByProduct\">";
                generatedOutput += "<div class=\"thumbnail\">";
                generatedOutput += "<img src=\"" + r[i].path + "/" + r[i].imageName + "." + r[i].format + "\" alt=\"" + r[i].imageName + "\">";
                generatedOutput += "<div class=\"caption\">";
                generatedOutput += "<h4>" + r[i].productName + "</h4>";
                //generatedOutput += "<h5>$" + r[i].price + "</h5>";
                //generatedOutput += "<h5>In stock: " + r[i].inStock + "</h5>";
                generatedOutput += "</div></div></a></div>";
            }

            $("#productsByCategory").html(generatedOutput);
        }
    });
}