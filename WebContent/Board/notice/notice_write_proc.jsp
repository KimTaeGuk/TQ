<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<jsp:useBean id="Notice_Access" class="DAO.Notice_Access" />
<jsp:useBean id="NoticeBean" class="DTO.NoticeBean" />
<jsp:setProperty name="NoticeBean" property="*" />
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
<%
	out.print(NoticeBean.getNotice_id()+"<br>");
	out.print(NoticeBean.getNotice_title()+"<br>");
	out.print(NoticeBean.getNotice_content()+"<br>");
	out.print(NoticeBean.getNotice_kategory()+"<br>");
	out.print(Notice_Access.notice_count());
	
	int count=Notice_Access.notice_count()+1;
	Notice_Access.notice_ins(NoticeBean, count);
%>
</body>
</html>