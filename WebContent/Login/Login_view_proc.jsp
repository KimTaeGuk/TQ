<%@ page import="java.io.Console"%>
<%@ page import="java.sql.*" %>
<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<%@page import="DAO.Login_Access" %>
<%@page import="DTO.LoginBean" %>

<jsp:useBean id="Login_Access" class="DAO.Login_Access" />
<jsp:useBean id="LoginBean"	class="DTO.LoginBean" />

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>로그인 처리</title>
</head>
<body>
<% 
	String seller=request.getParameter("seller");

	String login_id=request.getParameter("login_id");
	String login_pw=request.getParameter("login_pw");

	if(seller==null){
		LoginBean bean=Login_Access.Login_proc(login_id, login_pw);
		
		login_id=bean.getLogin_id();
		login_pw=bean.getLogin_pw();		
		String login_photo=bean.getLogin_photo_identification();
			
			if(login_id!=null && login_pw!=null){
				session.setAttribute("id", login_id);
				session.setAttribute("pw", login_pw);
				session.setAttribute("photo",login_photo);	
				session.setAttribute("is_login", true);
				
				response.sendRedirect("../index.jsp");
			}	else {
	%>
				<script>
					alert("아이디 또는 비밀번호가 일치하지 않습니다.");
					history.back();
				</script>
	<%
			}	
	}	else {
			LoginBean sellerbean=Login_Access.Seller_login(LoginBean, login_id, login_pw);
			
			if(sellerbean.getLogin_id()!=null && sellerbean.getLogin_pw()!=null){
				session.setAttribute("id", sellerbean.getLogin_id());
				session.setAttribute("pw", sellerbean.getLogin_pw());
				session.setAttribute("is_login", true);

				response.sendRedirect("../index.jsp");
			}	else {
	%>
				<script>
					alert("아이디 또는 비밀번호가 일치하지 않습니다.");
					history.back();
				</script>
	<%
			}	
	}
%>
</body>
</html>