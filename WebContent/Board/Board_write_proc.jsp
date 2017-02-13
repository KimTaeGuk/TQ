<%@page import="DAO.Board_Access"%>
<%@page import="java.sql.*"%>
<%@page import="java.util.*"%>
<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>

<jsp:useBean id="Board_Access" class="DAO.Board_Access" />
<jsp:useBean id="BoardBean" class="DTO.BoardBean" />

<jsp:setProperty name="BoardBean" property="*" />

<%
	request.setCharacterEncoding("UTF-8");
	
	int count=Board_Access.count()+1;
	Board_Access.insert(BoardBean, count);
	response.sendRedirect("./Board_list.jsp");
%>
</body>
</html>