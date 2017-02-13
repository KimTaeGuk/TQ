<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
    
<%@ page import="DAO.Comment_Access" %>
<%@ page import="DTO.CommentBean" %>
<jsp:useBean id="Comment_Access" class="DAO.Comment_Access" />
<jsp:useBean id="CommentBean" class="DTO.CommentBean" />

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
<%
	int comment_num=Integer.parseInt(request.getParameter("comment_num"));
	int board_num=Integer.parseInt(request.getParameter("board_num"));

	CommentBean commentbean=Comment_Access.comment_modifyText(board_num, comment_num);
	
	int bnum=commentbean.getBoard_num();
	String cid=commentbean.getComment_id();
	String ctext=commentbean.getComment_content();
	int cnum=commentbean.getComment_num();	
%>
<form method="POST" action="./comment/comment_modify_proc.jsp">
	<input type="hidden" value="<%=bnum%>" name="board_num" />
	<input type="hidden" value="<%=cid%>" name="comment_id" />
	<input type="hidden" value="<%=cnum%>" name="comment_num" />
	
	<table>
		<tr>
			<td><textarea name="comment_content"><%=ctext%></textarea></td>
		</tr>
		<tr>
			<td style="text-align: center;"><input type="submit" value="수정완료" /></td>
		</tr>
	</table>
</form>
</body>
</html>