<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>

<jsp:useBean id="Reply_Access" class="DAO.Reply_Access" />
<jsp:useBean id="ReplyBean" class="DTO.ReplyBean" />

<jsp:setProperty name="ReplyBean" property="board_num" />
<jsp:setProperty name="ReplyBean" property="comment_num" />
<jsp:setProperty name="ReplyBean" property="reply_id" />
<jsp:setProperty name="ReplyBean"	property="reply_content" />

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
 <br>Comment_num : <%=request.getParameter("comment_num")%>
 <br>board_num : <%=request.getParameter("board_num")%>
 <br>reply_content : <%=request.getParameter("reply_content")%>
 <br>reply_id : <%=request.getParameter("reply_id")%><br>
 
 <%
 	int count=Reply_Access.reply_count(ReplyBean);
 	out.print("COUNT : " + count);
 	
 	Reply_Access.reply_insert(ReplyBean, (count+1));
 	
	response.sendRedirect("../Board_view.jsp?num="+ReplyBean.getBoard_num());
 %>
 
</body>
</html>