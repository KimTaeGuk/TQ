<%@ page language="java" contentType="text/html; charset=EUC-KR"
    pageEncoding="EUC-KR"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=EUC-KR">
<title>Insert title here</title>
</head>
<body>
<form method="POST" action="registerWrite.do">
	<table>
		<tr>
			<td>ID</td>
			<td><input type="text" name="registerId"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" name="registerPw"></td>		
		</tr>
		<tr>
			<td>Name</td>
			<td><input type="text" name="registerName"></td>		
		</tr>
		<tr>
			<td>Birth</td>
			<td><input type="text" name="registerBirth"></td>		
		</tr>
		<!-- registerImg MultipartRequest를 써야하므로 어느정도 익숙해지고 써보자 이건 나중에 해보자 -->
		<tr>
			<td></td>
			<td></td>		
		</tr>
		<tr>
			<td colspan="2"><input type="submit" value="제출"></td>
		</tr>
	</table>
</form>
</body>
</html>