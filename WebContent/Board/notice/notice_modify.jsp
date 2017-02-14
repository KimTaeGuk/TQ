<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<%@ page import="DTO.NoticeBean" %>
<jsp:useBean id="Notice_Access" class="DAO.Notice_Access" />
<jsp:useBean id="NoticeBean" class="DTO.NoticeBean" />
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
<%
	int Get_num=Integer.parseInt(request.getParameter("num"));
	NoticeBean noticebean=Notice_Access.notice_view(Get_num);
	
	String title=noticebean.getNotice_title();
	String content=noticebean.getNotice_content();
%>
<form method="POST" action="./notice_modify_proc.jsp?num=<%=Get_num%>" >
	<table>
		<tr>
			<td>제목</td>
			<td><input type="text" name="notice_title" value="<%=title%>"></td>
		</tr>
		<tr>
			<td>내용</td>
			<td><textarea name="notice_content"><%=content%></textarea></td>	
		</tr>
		<tr>
			<td colspan=2><input type="submit" value="수정완료" /></td>
		</tr>
	</table>
</form>
</body>
</html>