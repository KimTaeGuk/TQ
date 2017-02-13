<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
<script>
	function Goods_submit(){
		var id="<%=session.getAttribute("id")%>";
		window.location='./Goods/Goods_write.jsp?id='+id;
	}
</script>
</head>
<body>
<%
	session.setMaxInactiveInterval(60*60*2);		//세션 지속 시간 2 시간
	out.print(session.getAttribute("id"));
	out.print(session.getAttribute("pw"));
%>
<input type="button" value="로그아웃" onclick="window.location='./Login/Logout_proc.jsp'" />
<input type="button" value="로그인" onclick="window.location='./Login/Login_view.jsp'" />
<input type="button" value="물건등록" onclick="Goods_submit();" />
<input type="button" value="게시판 리스트" onclick="window.location='./Board/Board_list.jsp'" />
<input type="button" value="물품 등록" onclick="window.location='./Goods/Goods_list.jsp'" alt="나중에 Seller 테이블의 사람만 가능하도록 할 것"/>
<input type="button" value="회원탈퇴" onclick="window.location='./Login/Login_delete.jsp'" />
<input type="button" value="회원수정" onclick="window.location='./Login/Login_modify.jsp'" />


</body>
</html>