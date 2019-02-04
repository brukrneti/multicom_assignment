<%@page import="multicom.assignment.entity.User"%>
<%@page import="multicom.assignment.db.Database"%>
<%@ page import="java.sql.*"%>
<%
    String userName = request.getParameter("username");   
    String password = request.getParameter("password");
    Connection con = Database.getInstance().con;
    Statement st = con.createStatement(ResultSet.TYPE_SCROLL_SENSITIVE, ResultSet.CONCUR_READ_ONLY);
    ResultSet rs;
    rs = st.executeQuery("SELECT * FROM korisnik WHERE korisnicko_ime='" + userName + "' AND lozinka='" + password + "'");
    if (rs.next()) {
        User user = new User(rs.getString("ime"), rs.getString("prezime"), rs.getString("korisnicko_ime"), rs.getDouble("stanje_racuna"));
        session.setAttribute("user", user);
        response.sendRedirect("home.jsp");
        session.removeAttribute("errorMessage");
        
    } else {
        request.getSession().setAttribute("errorMessage", "Neispravni podaci. Pokusajte ponovno.");
        response.sendRedirect(request.getHeader("Referer"));
    }
%>
