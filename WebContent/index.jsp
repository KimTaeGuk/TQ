<%@ page language="java" contentType="text/html; charset=EUC-KR"
    pageEncoding="EUC-KR"%>
<%@ page import="java.util.HashMap" %>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=EUC-KR">
<title>Insert title here</title>
</head>
<body>
	<c:forEach var="item" items="${mapSession }">
		${item.getKey() }
		${item.getValue() }<br>
	</c:forEach>

	<c:set var="name" value="loginId"/>
	<c:if test="${mapSession.containsKey(name)}">
		사이즈 : ${mapSession.size() }
	</c:if>
	<br>
	<c:out value="${mapSession }" />
	<button onclick="window.location.href='logout.jsp'">로그아웃</button>
	
	<button onclick="window.location.href='boardWrite.jsp'">글 쓰기</button>
</body>
</html>