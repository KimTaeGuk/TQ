<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
    
<jsp:useBean id="Comment_Access" class="DAO.Comment_Access" />
<jsp:useBean id="CommentBean" class="DTO.CommentBean" />
<jsp:setProperty name="CommentBean" property="*" />

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
<%
	Comment_Access.comment_modify(CommentBean);
	response.sendRedirect("../Board_view.jsp?num="+request.getParameter("board_num"));
%>
</body>
</html>