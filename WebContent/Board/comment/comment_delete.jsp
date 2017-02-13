<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<jsp:useBean id="Comment_Access" class="DAO.Comment_Access" />

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
<%
	int board_num=Integer.parseInt(request.getParameter("board_num"));
	int comment_num=Integer.parseInt(request.getParameter("comment_num"));
	
	Comment_Access.comment_delete(board_num, comment_num);
	
	
%>
</body>
</html>