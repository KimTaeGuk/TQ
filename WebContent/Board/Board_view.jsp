<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<%@page import="java.util.ArrayList"%>
<%@page import="java.sql.*" %>

<%@page import="DAO.*" %>
<%@page import="DTO.*" %>

<jsp:useBean id="Board_Access" class="DAO.Board_Access"/>
<jsp:useBean id="BoardBean" class="DTO.BoardBean"/>

<jsp:useBean id="Comment_Access" class="DAO.Comment_Access"/>
<jsp:useBean id="CommentBean" class="DTO.CommentBean"/>
<%
	int Get_num=Integer.parseInt(request.getParameter("num"));

	Board_Access.Count_up(Get_num);
	BoardBean bean=Board_Access.Board_view(Get_num);
	
	// 변수 설정
	int num=bean.getBoard_num();
	int star=bean.getBoard_star();
	int count=bean.getBoard_count();
	
	String id=bean.getBoard_id();
	String content=bean.getBoard_content();
	String title=bean.getBoard_title();
	String date=bean.getBoard_date();
%>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Board_view</title>
<style>
	td{
		border: 1px double black;
	}
</style>
<script src="../js/jquery-3.1.1.min.js"></script>

</head>
<body>
<form action="./comment/comment_write_proc.jsp" method="POST">
<div id="id" style="border:1px solid black;"></div>
	<table>
		<tr>
			<td>번호</td>
			<td><%=num%></td>
		</tr>
		<tr>
			<td>방문 수</td>
			<td><%=count%></td>
		</tr>
		<tr>
			<td>작성자</td>
			<td><%=id%></td>
		</tr>		
		<tr>
			<td>제목</td>
			<td><%=title%></td>
		</tr>
		<tr>
			<td>내용</td>
			<td><%=content%></td>
		</tr>
		<tr>
			<td>별점</td>
			<td><%=star%></td>
		</tr>
		<tr>
			<td>작성일</td>
			<td><%=date%></td>
		</tr>
	</table>

<!---------------------------------------------------------------------->
<!-------------------------------- 댓 글 ---------------------------------->
<!---------------------------------------------------------------------->
	<input type="hidden" name="board_num" value="<%=num%>" />	
	<input type="hidden" name="comment_id" value="<%=session.getAttribute("id")%>">
	
	<table>
		<tr>
			<td>Content</td>
			<td><textarea name="comment_content" cols="40" rows="10"></textarea></td>
		</tr>
		<tr>
			<td colspan=2 style="text-align:center;"><input type="submit" value="submit"></td>
		</tr>
	</table>
</form>
		
		<%
			ArrayList<CommentBean> list=Comment_Access.comment_list(num);
		
			for(int i=0;i<list.size();i++){
				CommentBean commentbean=list.get(i);
				String comment_id=commentbean.getComment_id();
				String comment_content=commentbean.getComment_content();
		%>
		<table>
			<tr>
				<td>
					<div id="likeOrhate_Div<%=i+1%>">
						<input type="button" value="<%=commentbean.getComment_like()%>좋아요" id="like_btn" onclick="comment_likeOrhate(<%=num%>,<%=i+1%>,1);"/>
						<input type="button" value="<%=commentbean.getComment_hate()%>싫어요" id="hate_btn" onclick="comment_likeOrhate(<%=num%>,<%=i+1%>,2);"/>
					</div>
				</td>
				<td><%=comment_id%></td>
				<td><%=comment_content%></td>
				<td><input type="button" value="댓글 보기" onclick="Co_comment(<%=i%>);" /></td>
				<td>
					<%
						if(session.getAttribute("id")!=null && session.getAttribute("id").equals(comment_id)){
					%>
						<input type="button" value="수정" onclick="comment_modify(<%=num%>,<%=i+1%>);" />
					<%
						}
					%>
				</td>
				<td>
					<%
						if(session.getAttribute("id")!=null && session.getAttribute("id").equals(comment_id)){
					%>
						<input type="button" value="삭제" onclick="comment_delete(<%=num%>,<%=i+1%>);" />
					<%
						}
					%>
				</td>
			</tr>
			<tr>
				<td colspan=6>
				<%
					out.print("<div id='C_Comment"+i+"'></div>");
				%>
				</td>
			</tr>
			<tr>
				<td colspan=6>
				<%
					out.print("<div id='Comment"+i+"_modify'></div>");
				%>
				</td>
			</tr>
		<%
			}
		%>
		</table>
<script>
$(document).ready(function(){

	//한 번에 Ajax 설정
<%-- 	for(i=0; i<<%=list.size()%>;i++){
		comment_likeOrhate(<%=num%>, (i+1));
	} --%>
	
	////////////////////////////////////////////////////////////////////////
	//////////////////////////////게시판 수정 삭제////////////////////////////////
	//////////////////////////////////////////////////////////////////////
	
	<%
	if(session.getAttribute("id")!=null && session.getAttribute("id").equals(id)){
	%>
		$('#id').html('<input type="button" value="삭제" onclick="board_del(<%=num%>)"/><input type="button" value="수정" onclick="board_mod(<%=num%>)"/>');
	<%		
	}
	%>
	});

	function board_del(num){
		window.location="./Board_delete.jsp?num="+num;
	}
	function board_mod(num){
		window.location="./Board_modify.jsp?num="+num;	
	}

	/////////////////////////////////////////////////////////////////////
	//////////////////////////////댓 글 삭 제////////////////////////////////
	///////////////////////////////////////////////////////////////////

	function comment_delete(board_num,comment_num){
		window.location="./comment/comment_delete.jsp?board_num="+board_num+"&&comment_num="+comment_num;
}
	
	function Co_comment(comment_num){
		$.ajax({
			type:"POST",
			url:"./comment/comment_view.jsp",
			data:{
				comment_num:(comment_num+1),
				board_num:<%=num%>
			},
			datatype:"html",
			success:function(data){
				$("#C_Comment"+comment_num).html(data);
			}
		});
	}

/////////////////////////////////////////////////////////////////////
//////////////////////////////댓 글 수 정////////////////////////////////
///////////////////////////////////////////////////////////////////

	function comment_modify(board_num,comment_num){
		$.ajax({
			type:"POST",
			url:"./comment/comment_modify.jsp",
			data:{
				board_num:board_num,
				comment_num:comment_num
			},
			datatype:"html",
			success:function(data){
				$("#Comment"+(comment_num-1)+"_modify").html(data);
			}
		});
	}
	
/////////////////////////////////////////////////////////////////////
////////////////////////////좋아요 싫어요 기능//////////////////////////////
///////////////////////////////////////////////////////////////////

function comment_likeOrhate(board_num, comment_num, likeOrhate){
	$.ajax({
		type:"POST",
		url:"./comment/comment_like_Or_hate.jsp",
		data:{
			board_num:board_num,
			comment_num:comment_num,
			likeOrhate:likeOrhate,
			comment_id:"<%=session.getAttribute("id")%>"
		},
		dataType:"html",
		success:function(data){
			$('#likeOrhate_Div'+comment_num).html(data);
		}
	});
}

</script>
</body>
</html>