<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<jsp:useBean id="Login_Access" class="DAO.Login_Access" />
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
<%
	String id=(String)session.getAttribute("id");
	String pw=(String)session.getAttribute("pw");

	Login_Access.login_del(id, pw);	
	
	session.invalidate();
	// 삭제 후 index 로 이동
	response.sendRedirect("../index.jsp");
%>
</body>
</html>