$(document).ready(function() {
    if ($("#username").val() != '') { //if username input field is not empty it means that user checked "Remember me" last time
        $('#rememberMe').prop('checked', true)
    }
    $("#fileUploadForm").submit(function(){
        if ($("#fileToUpload").val() == '') {
            alert("Please choose XML document to upload before submitting the form!");
            event.preventDefault();
        }
    });

    $("#showProductsBtn").click(function() {
            $("#showProductsDiv").toggle();

            if ($("#showProductsDiv").css('display')=="none") {
                $("#showProductsBtn").val("Show");
            }
            else {
                $("#showProductsBtn").val("Hide");
            }
            showHideProducts();
    });

    $("#fetchOfferBtn").click(function(){
        if ($("#codeInputField").val() == '') {
            alert("Please enter the code before trying to fetch the offer!");
            event.preventDefault();
        }
        else {
            var offerCode = $("#codeInputField").val();
            var generatedOutput = "";
            var dateSent ="";
            $.ajax({
                url: 'fetch_offer.php',
                type: 'GET',
                data: {'offerCode': offerCode},
                dataType: 'json',
                async: false,
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(textStatus +"  "+ errorThrown + "  " + XMLHttpRequest.responseText);
                },
                success: function (data) {
                    dateSent = new Date(data.sentTimestamp * 1000).toISOString().slice(0,10); //get YYYY-MM-DD format from timestamp
                    generatedOutput += "<br><h3>Offer report</h3><br>";
                    generatedOutput += "<form id=\"offerForm\" class=\"form-horizontal\">";
                    generatedOutput += "<label for=\"offerCodeInput\" class=\"col-lg-4 col-md-4 col-xs-4 col-sm-4\">Offer code</label>"
                    generatedOutput += "<input type=\"text\" name=\"offerCodeInput\" id=\"offerCodeInput\" class=\"col-lg-8 col-md-8 col-xs-8 col-sm-8\" value=\"" + data.code + "\" disabled>";
                    generatedOutput += "<label for=\"dateSent\" class=\"col-lg-4 col-md-4 col-xs-4 col-sm-4\">Date sent</label>";
                    generatedOutput += "<input type=\"text\" name=\"dateSent\" id=\"dateSent\" class=\"col-lg-8 col-md-8 col-xs-8 col-sm-8\" value=\"" + dateSent + "\" disabled>";
                    generatedOutput += "<label for=\"customerInput\" class=\"col-lg-4 col-md-4 col-xs-4 col-sm-4\">Customer</label>";
                    generatedOutput += "<input type=\"text\" name=\"customerInput\" id=\"customerInput\" class=\"col-lg-8 col-md-8 col-xs-8 col-sm-8\" value=\"" + data.customer + "\" disabled>";
                    generatedOutput += "<label for=\"contactInput\" class=\"col-lg-4 col-md-4 col-xs-4 col-sm-4\">Contact name</label>";
                    generatedOutput += "<input type=\"text\" name=\"contactInput\" id=\"contactInput\" class=\"col-lg-8 col-md-8 col-xs-8 col-sm-8\" value=\"" + data.contact_name + "\" disabled>";
                    generatedOutput += "<br><br><fieldset>";
                    generatedOutput += "<label for=\"contactInput\">List of products</label>";

                    for (var i=0;i<data.products.length;i++) {
                        generatedOutput += "<label for=\"productName\">" + data.products[i].name + "</label>";
                        generatedOutput += "<label for=\"productPriceInput\" class=\"col-lg-4 col-md-4 col-xs-4 col-sm-4\">Price</label>";
                        generatedOutput += "<input type=\"text\" name=\"productPriceInput\" id=\"productPriceInput\" class=\"col-lg-8 col-md-8 col-xs-8 col-sm-8\" value=\"" + data.products[i].price + "\" disabled>";
                        generatedOutput += "<label for=\"productDiscountInput\" class=\"col-lg-4 col-md-4 col-xs-4 col-sm-4\">Discount</label>";
                        generatedOutput += "<input type=\"text\" name=\"productDiscountInput\" id=\"productDiscountInput\" class=\"col-lg-8 col-md-8 col-xs-8 col-sm-8\" value=\"" + data.products[i].discount_percentage + "\" disabled>";
                        generatedOutput += "<br>"
                    }
                    generatedOutput += "</fieldset>";
                    generatedOutput += "<br>";
                    generatedOutput += "<label for=\"totalInput\" class=\"col-lg-4 col-md-4 col-xs-4 col-sm-4\">Total</label>";
                    generatedOutput += "<input type=\"text\" name=\"totalInput\" id=\"totalInput\" class=\"col-lg-8 col-md-8 col-xs-8 col-sm-8\" value=\"" + data.total + "\" disabled>";
                    generatedOutput += "</form>";

                    $("#popUpOffer").html(generatedOutput);
                }
            });
        }
    });

});

function showHideProducts () {
    $.ajax({
        url: 'get_products.php',
        type: 'GET',
        dataType: 'json',
        async: false,
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert(textStatus +"  "+ errorThrown + "  " + XMLHttpRequest.responseText);
        },
        success: function (data) {
            var generatedOutput = "";

            for(var i = 0; i < data.length; i++) {
                generatedOutput += "<p>[" + (i+1) + "] " + data[i].name + "</p>"
            }

            $("#showProductsDiv").html(generatedOutput);
        }
    });
}