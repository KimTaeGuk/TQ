<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
    
 <%@page import="DTO.NoticeBean" %>
<jsp:useBean id="Notice_Access" class="DAO.Notice_Access" />
<jsp:useBean id="NoticeBean" class="DTO.NoticeBean" />

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
<style>
	td{
		border: 1px double black;
	}
</style>
</head>
<body>
<%
	int Get_num=Integer.parseInt(request.getParameter("num"));

	Notice_Access.notice_cnt_up(Get_num);
	NoticeBean noticebean=Notice_Access.notice_view(Get_num);
	
	int num=noticebean.getNotice_num();
	int count=noticebean.getNotice_count();
	
	String id=noticebean.getNotice_id();
	String title=noticebean.getNotice_title();
	String content=noticebean.getNotice_content();
	String date=noticebean.getNotice_date();
%>
	<%
		if(session.getAttribute("id")!=null && session.getAttribute("id").equals(id)){
	%>
			<input type="button" value="수정" onclick="javascript:window.location='./notice_modify.jsp?num=<%=num%>'" />
			<input type="button" value="삭제" onclick="javascript:window.location='./notice_delete.jsp?num=<%=num%>'" />
	<%
		}
	%>
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
			<td>작성일</td>
			<td><%=date%></td>
		</tr>
	</table>
</body>
</html>