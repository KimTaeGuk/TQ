<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<jsp:useBean id="Reply_Access" class="DAO.Reply_Access" />

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
BOARD : <%=request.getParameter("board_num")%><br> 
COMMENT : <%=request.getParameter("comment_num")%><br> 
REPLY : <%=request.getParameter("reply_num")%><br>

<%
int board_num=Integer.parseInt(request.getParameter("board_num"));
int comment_num=Integer.parseInt(request.getParameter("comment_num"));
int reply_num=Integer.parseInt(request.getParameter("reply_num"));

	Reply_Access.reply_delete(board_num, comment_num, reply_num);
	
	response.sendRedirect("../Board_view.jsp?num="+request.getParameter("board_num"));
%>
</body>
</html>