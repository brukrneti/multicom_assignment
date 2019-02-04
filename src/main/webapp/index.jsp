<%@page contentType="text/html" pageEncoding="UTF-8"%>
<% if(session.getAttribute("user")!=null) 
                                response.sendRedirect("home.jsp"); 
                            %>
<!DOCTYPE html>
<html>
    <head>
        <title>Start Page</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"  crossorigin="anonymous"></script>
        <link rel="stylesheet" href="resources/css/main.css">
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <form method="POST" action="login.jsp">
                        <div class="form-group">
                            <img src="resources/img/multicom-logo.png">
                        </div>
                        <div class="form-group">
                            <label for="username">Korisničko ime:</label>
                            <input type="text" class="form-control" id="username" name="username">
                        </div>
                        <div class="form-group">
                            <label for="password">Lozinka:</label>
                            <input type="password" class="form-control" id="password"name="password">
                        </div>
                        <p id="error-message">
                            <% if(request.getSession().getAttribute("errorMessage")!=null) 
                                out.println(request.getSession().getAttribute("errorMessage")); 
                            %>
                        </p>
                        <div class="form-group">
                            <input type="submit" class="form-control btn btn-login" value="Prijavi se" id="login-button">
                        </div
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
