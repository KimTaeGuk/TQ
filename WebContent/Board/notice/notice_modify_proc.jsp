<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>

<jsp:useBean id="NoticeBean" class="DTO.NoticeBean" />
<jsp:useBean id="Notice_Access" class="DAO.Notice_Access" />
<jsp:setProperty name="NoticeBean" property="*" />
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
<%
	int num=Integer.parseInt(request.getParameter("num"));
	String notice_title=request.getParameter("notice_title");
	String notice_content=request.getParameter("notice_content");
	
	Notice_Access.notice_mod(NoticeBean, num);
%>
</body>
</html>