function GetCsvData(urlAction) {
    $.ajax({
        url: urlAction,
        type: 'GET',
        dataType: 'json',
        contentType: 'application/json',
        async: false,
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert(textStatus + "  " + errorThrown + "  " + XMLHttpRequest.responseText);
        },
        success: function (data) {
            var generatedOutput = "<table class=\"table table-hover\">";
            generatedOutput += "<tr>";
            generatedOutput += "<th>Name</th>";
            generatedOutput += "<th>Surname</th>";
            generatedOutput += "<th>ZIP code</th>";
            generatedOutput += "<th>City</th>";
            generatedOutput += "<th>Phone</th>";
            generatedOutput += "</tr>"

            for (var i = 0; i < data.length; i++) {
                generatedOutput += "<tr>";
                generatedOutput += "<td class=\"name\">" + data[i].Name + "</td>";
                generatedOutput += "<td class=\"surname\">" + data[i].Surname + "</td>";
                generatedOutput += "<td class=\"zipcode\">" + data[i].ZipCode + "</td>";
                generatedOutput += "<td class=\"city\">" + data[i].City + "</td>";
                generatedOutput += "<td class=\"phone\">" + data[i].Mobile + "</td>";
                generatedOutput += "</tr>";
            }
            generatedOutput += "</table>"

            $("#csvDataDiv").html(generatedOutput);
        }
    });
}

function StoreCsvData(urlAction) {
    $.ajax({
        url: urlAction,
        type: 'GET',
        dataType: 'json',
        contentType: 'application/json',
        async: false,
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert(textStatus + "  " + errorThrown + "  " + XMLHttpRequest.responseText);
        },
        success: function (data) {
            var message = '';
            for (var i = 0; i < data.length; i++) {
                message += (i+1) + ". row info: " + data[i] + "\r\n";
            }

            alert(message);
        }
    });
}

$(document).ready(function () {
    //Load csv data
    $("#getCsvDataBtn").click(function () {
        
        $("#csvDataDiv").toggle();
        
        if ($("#csvDataDiv").css('display') == "none") {
            $("#getCsvDataBtn").val("Show details");
        }
        else {
            $("#getCsvDataBtn").val("Hide details");
        }

        var url = $(this).data('request-url');
        
        GetCsvData(url);

        //Check if zipcode is in valid format
        var zipcodeREGEX = /^\d{5}$/;
        $(".zipcode").each(function () {
            var currentId = $(this);
            if (zipcodeREGEX.test(currentId.text()) == false) {
                currentId.addClass("invalidZipcode");
            }
        });

        $(".invalidZipcode").css('border', '3px solid red');
    });

    $("#storeCsvDataBtn").click(function () {
        var url = $(this).data('request-url');
        StoreCsvData(url);
    });
});