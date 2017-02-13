<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<%
	String login_id=(String)session.getAttribute("id");
	String login_pw=(String)session.getAttribute("pw");
%>
<body>
	<form method="POST" action="./Login_modify_proc.jsp">
		이름<input type="text" name="login_name" />
		<input type="hidden" name="login_id" value="<%=login_id%>" />
		<input type="hidden" name="login_pw" value="<%=login_pw%>" />
		<input type="submit" value="수정 완료" />
	</form>
</body>
</html>