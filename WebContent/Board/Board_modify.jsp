<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
    
<%@page import="DAO.Board_Access" %>
<%@page import="DTO.BoardBean" %>
<jsp:useBean id="Board_Access" class="DAO.Board_Access"/>
<jsp:useBean id="BoardBean" class="DTO.BoardBean"/>

<%
	int Get_num=Integer.parseInt(request.getParameter("num"));
	BoardBean bean=Board_Access.Board_view(Get_num);

	// 변수 설정
	int num=bean.getBoard_num();
	int star=bean.getBoard_star();
	String title=bean.getBoard_title();
	String content=bean.getBoard_content();
%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
<script src="../js/jquery-3.1.1.min.js"></script>
<script>
	$(document).ready(function(){
		$('#board_star').val("<%=star%>").prop("selected",true);
	});
</script>
</head>
<body>
<form name="modify_fm" method="POST" action="Board_modify_proc.jsp?num=<%=num%>">
<table>
	<tr>
		<td>제목</td>
		<td><input type="text" name="board_title" value="<%=title%>"></td>
	</tr>
	<tr>
		<td>내용</td>
		<td><textarea name="board_content"><%=content%></textarea></td>	
	</tr>
	<tr>
		<td>별</td>
		<td>
			<select name="board_star" id="board_star">
				<option value=1>★</option>
				<option value=2>★★</option>
				<option value=3>★★★</option>
				<option value=4>★★★★</option>
				<option value=5>★★★★★</option>
			</select>
		</td>	
	</tr>
	<tr>
		<td colspan=2><input type="submit" value="완료" /></td>
	</tr>
</table>
</form>
</body>
</html>