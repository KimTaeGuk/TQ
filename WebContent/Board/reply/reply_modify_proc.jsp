<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
    
<jsp:useBean id="Reply_Access" class="DAO.Reply_Access" />
<jsp:useBean id="Replybean" class="DTO.ReplyBean" />
<jsp:setProperty name="Replybean" property="*" />
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
BOARD : <%=Replybean.getBoard_num()%><br> 
COMMENT : <%=Replybean.getComment_num()%><br> 
REPLY : <%=Replybean.getReply_num()%><br>
CONTENT : <%=Replybean.getReply_content()%>

<%
	Reply_Access.reply_modify(Replybean);
	response.sendRedirect("../Board_view.jsp?num="+Replybean.getBoard_num());
%>
</body>
</html>