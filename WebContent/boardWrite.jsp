<%@ page language="java" contentType="text/html; charset=EUC-KR"
    pageEncoding="EUC-KR"%>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=EUC-KR">
<title>Insert title here</title>
</head>
<body>

	<form action="boardWrite.do" method="POST">
		<table>
			<tr>
				<td>ID</td>
				<td><c:out value="${mapSession.get('loginId') }" /></td>
			</tr>
			<tr>
				<td>title</td>
				<td><input type="text" name="boardTitle" size="49"/></td>
			</tr>
			<tr>
				<td>content</td>
				<td><textarea name="boardContent" rows="10" cols="50"></textarea></td>
			</tr>
			<tr>
				<td>별점</td>
				<td>
					<select name="boardStar">
						<option value="1">★</option>
						<option value="2">★★</option>
						<option value="3">★★★</option>
						<option value="4">★★★★</option>
						<option value="5">★★★★★</option>
					</select>
				</td>
			</tr>		
			<tr>
				<td colspan="2"><input type="submit"></td>
			</tr>	
		</table>
	</form>
</body>
</html>