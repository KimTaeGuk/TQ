<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<jsp:useBean id="Login_Access" class="DAO.Login_Access" />
<jsp:useBean id="LoginBean" class="DTO.LoginBean" />
<jsp:setProperty name="LoginBean" property="*" />
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
<%
	Login_Access.login_modify(LoginBean);
%>
</body>
</html>