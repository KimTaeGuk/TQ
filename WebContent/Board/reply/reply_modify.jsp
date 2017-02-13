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

<%
	Reply_Access.reply_modifyText(Replybean);
%>
<form method="POST">
<table>
<tr>
	<td>
		<input type="hidden" name="board_num" value="<%=Replybean.getBoard_num()%>"/>
		<input type="hidden" name="comment_num" value="<%=Replybean.getComment_num()%>"/>
		<input type="hidden" name="reply_num" value="<%=Replybean.getReply_num()%>"/>
		<textarea name="reply_content"><%=Replybean.getReply_content()%></textarea>
		<input type="submit" value="수정완료" formaction='./reply/reply_modify_proc.jsp'/>
	</td>
</tr>
</table>
</form>
</body>
</html>