<%@ page language="java" contentType="text/html; charset=EUC-KR"
    pageEncoding="EUC-KR"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=EUC-KR">
<title>Insert title here</title>
</head>
<body>
<form method="POST" action="loginproc.do">
	<table>
		<tr>
			<td>ID</td>
			<td><input type="text" name="loginId" /></td>
		</tr>
		<tr>
			<td>PW</td>
			<td><input type="password" name="loginPw" /></td>		
		</tr>
		<tr>
			<td colspan="2"><input type="submit" value="제출"></td>
		</tr>
	</table>
</form>
</body>
</html>