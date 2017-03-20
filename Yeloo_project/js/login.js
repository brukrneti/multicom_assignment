$(document).ready(function() {
    if ($("#username").val() != '') { //if username input field is not empty it means that user checked "Remember me" last time
        $('#rememberMe').prop('checked', true)
    }
    $("form").submit(function(){
        if ($("#username").val() == '' || $("#pwd").val() == '') {
            alert("All the fields have to be filled!");
            event.preventDefault();
        }
        else {
            CheckLogin();
        }
    });
});


function CheckLogin() {
    var username = $("#username").val();
    var password = $("#pwd").val();
    var rememberMe = $("#rememberMe").is(':checked'); //checkbox's value is true/false whether is checked or not
    
    $.ajax({
        url: 'login_autentification.php',
        type: 'GET',
        data: {'username': username, 'password': password, 'rememberMe': rememberMe},
        dataType: 'json',
        async: false,
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert(textStatus +"  "+ errorThrown + "  " + XMLHttpRequest.responseText);
        },
        success: function (data) {
            if (data=='loginFailed') {
                alert("Invalid username and/or password!")
                event.preventDefault();
            }
        }
    });
}