<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
  
<jsp:useBean id="Comment_Access" class="DAO.Comment_Access" /> 
<jsp:useBean id="commentbean" class="DTO.CommentBean" />
<jsp:setProperty name="commentbean" property="*" />    
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
<%
	int count=Comment_Access.comment_count(commentbean)+1;
	
//////////////////////////1차 댓글일시 3번쨰 란을 1로//////////////////////////
	Comment_Access.comment_insert(commentbean, count, 1);
	out.println(count+"<br>");
	out.println(commentbean.getBoard_num()+"<br>");
	out.println(commentbean.getComment_content()+"<br>");
	out.println(commentbean.getComment_id()+"<br>");
	out.println(commentbean.getComment_num()+"<br>");
	
	response.sendRedirect("../Board_view.jsp?num="+commentbean.getBoard_num());

%>
</body>
</html>