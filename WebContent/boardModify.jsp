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
	<form action="boardModify.do" method="POST">
		<input type="hidden" name="boardId" value="${boardBean.boardId }" />
		<input type="hidden" name="boardNum" value="${boardBean.boardNum }"/>
		<table>
			<tr>
				<td>title</td>
				<td><input type="text" name="boardTitle" value="${boardBean.boardTitle }"></td>
			</tr>		
			<tr>
				<td>Content</td>
				<td><textarea name="boardContent">${boardBean.boardContent }</textarea></td>			
			</tr>
			<tr>
				<td>Star</td>
				<td>
					<select name="boardStar">
						<option value="1">��</option>
						<option value="2">�ڡ�</option>
						<option value="3">�ڡڡ�</option>
						<option value="4">�ڡڡڡ�</option>
						<option value="5">�ڡڡڡڡ�</option>
					</select>
				</td>			
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="����"></td>
			</tr>
		</table>
	</form>
</body>
</html>