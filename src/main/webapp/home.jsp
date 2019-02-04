<%@page contentType="text/html" pageEncoding="UTF-8"%>
<% if (session.getAttribute("user") == null) {
        response.sendRedirect("index.jsp");
    }
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
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse navbar-right" id="navbarSupportedContent">
                <ul class="nav navbar navbar-right ml-auto pr-0">
                    <form method="POST" class="ml-auto" action="logout.jsp">
                        <button class="btn btn-logout ml-auto" type="submit">Odjava</button>
                    </form>
                </ul>
            </div>
        </nav>

        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Ime</th>
                                <th scope="col">Prezime</th>
                                <th scope="col">Korisničko ime</th>
                                <th scope="col">Stanje računa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>${user.name}</td>
                                <td>${user.surname}</td>
                                <td>${user.username}</td>
                                <td>${user.accountBalance}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
