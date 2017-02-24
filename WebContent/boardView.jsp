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
		<tr>
			<td>${boardBean.boardNum }</td>
			<td>${boardBean.boardId }</td>
			<td>${boardBean.boardTitle }</td>		
			<td>${boardBean.boardDate }</td>
			<td>${boardBean.boardCount }</td>
			<td>${boardBean.boardStar }</td>	
		</tr>
		<tr>
			<td colspan="3"><input onclick="location.href='boardModify.do?boardNum=${boardBean.boardNum}'" type="button" value="수정" ></td>
			<td colspan="3"><input onclick="location.href='boardDelete.do?boardNum=${boardBean.boardNum}'"  type="button" value="삭제"  ></td>
		</tr>
	</table>
</body>
</html>