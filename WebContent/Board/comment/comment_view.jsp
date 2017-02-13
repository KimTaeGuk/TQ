<%@page import="DTO.ReplyBean"%>
<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<%@ page import="java.util.ArrayList" %>
<jsp:useBean id="Reply_Access" class="DAO.Reply_Access" />
<jsp:useBean id="ReplyBean" class="DTO.ReplyBean" />
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
<script src="../js/jquery-3.1.1.min.js"></script>
</head>
<body>
<form method="POST" name="reply">
<table>
	<%
		int board_num=Integer.parseInt(request.getParameter("board_num"));
		int comment_num=Integer.parseInt(request.getParameter("comment_num"));
		
		ArrayList<ReplyBean> replylist=Reply_Access.reply_list(board_num, comment_num);
		
		for(int i=0;i<replylist.size();i++){
			ReplyBean replybean=replylist.get(i);
			
			String reply_id=replybean.getReply_id();
			String reply_content=replybean.getReply_content();
			int reply_num=replybean.getReply_num();
	%>
	<tr>
		<td><%=reply_num%></td>
		<td><%=reply_id%></td>
		<td><%=reply_content%></td>

		<td>
			<%
				if(session.getAttribute("id") !=null && session.getAttribute("id").equals(reply_id)){
			%>
				<input type="hidden" value="<%=request.getParameter("comment_num")%>" name="comment_num" />
				<input type="hidden" value="<%=request.getParameter("board_num")%>" name="board_num" />	
				
				<input type="button" value="수정" onclick="reply_modify(<%=request.getParameter("board_num")%>,<%=request.getParameter("comment_num")%>,<%=reply_num%>);" />
				<input type="submit" value="삭제" formaction="./reply/reply_delete.jsp?reply_num=<%=reply_num%>"/>
			<%
				}
			%>
		</td>
	</tr>
	<tr>
		<td colspan=4>
			<div id="reply_modify_Div<%=reply_num%>">
			
			</div>
		</td>
	</tr>
	<%
		}
	%>
</table>
</form>


<form method="POST" action="./comment/c_reply_proc.jsp">
<input type="hidden" value="<%=request.getParameter("comment_num")%>" name="comment_num" />
<input type="hidden" value="<%=request.getParameter("board_num")%>" name="board_num" />
<input type="hidden" value="<%=session.getAttribute("id")%>" name="reply_id"/>
<textarea name="reply_content"></textarea>
<input type="submit" value="대댓글 작성완료" />
</form>
<script>
	function reply_modify(board_num, comment_num, reply_num){
		$.ajax({
			type:"POST",
			url:"./reply/reply_modify.jsp",
			data:{
				board_num:board_num,
				comment_num:comment_num,
				reply_num:reply_num
			},
			dataType:"html",
			success:function(data){
				$('#reply_modify_Div'+reply_num).html(data);
			}
		});
	}
</script>
</body>
</html>