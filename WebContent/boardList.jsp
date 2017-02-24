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
	<table>
		<tr>
			<th>No</th>
			<th>ID</th>
			<th>TITLE</th>
			<th>DATE</th>
			<th>COUNT</th>
			<th>STAR</th>
		</tr>
	
			<c:forEach var="list" items="${listBean }">
				<tr>
					<td>${list.boardNum }</td>
					<td>${list.boardId }</td>
					<td><a href="boardView.do?boardNum=${list.boardNum }">${list.boardTitle }</a></td>
					<td>${list.boardDate }</td>
					<td>${list.boardCount }</td>
					<td>${list.boardStar }</td>
				</tr>	
			</c:forEach>
		
		<tr>
			<td colspan="6"><input type="button" onclick="location.href='./boardWrite.jsp'" value="제출"/></td>
		</tr>
	</table>
</body>
</html>