<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<%@ page import="java.util.*" %>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Register</title>

<link rel="stylesheet" type="text/css" href="../css/All.css">
<script src="../js/jquery-3.1.1.min.js"></script>
<script src="../js/Register_view.js"></script>
</head>
<body>
<H2>회원가입</H2>
<hr/>
<form name="fm" id="fm" method="POST" action="./Register_proc.jsp">
	<!-- placeholder : text 안에 회색깔의 글자 표시 -->
	<table>
		<tr>
			<td>아이디 </td>
			<td><input type="text" name="register_id" id="id" onchange="javascript:change_id(this.value);" autofocus /></td>
			<td><input type="button" id="id_check" value="ID확인" onclick="javascript:chk_id(this.form);"/></td>
		</tr>
		<tr>
			<td>비밀번호 </td>
			<td><input type="password" name="register_pw" id="pw"/></td>
			<th rowspan=2 id="chkpw_div" style="text-align: center;"></th>
		</tr>
		<tr>
			<td>비밀번호 확인 </td>
			<td><input type="password" id="confirm_pw"/></td>
		</tr>
		<tr>
			<td>이름</td>
			<td colspan=2><input type="text" name="register_name" id="name"/></td>
		</tr>
		<tr>
			<td>생년월일</td>
			<td colspan=2>
				<select id="year" name="register_year">
				<%
					Calendar today=Calendar.getInstance();	//오늘 날짜를 받음
					int year=today.get(Calendar.YEAR);
					for(int i=1917;i<=year;year--){
				%>		<option value="<%=year%>"><%=year%></option>
				<%	
					}
				%>
				</select>년

				<select id="month" name="register_month" onchange="appendDay(this.value);">
				<%	
					for(int i=1;i<=12;i++){
				%>		<option value="<%=i%>"><%=i%></option>
				<%	
					}
				%>
				</select>월
				<select id="day" name="register_day">

				</select>일
			</td>
		</tr>
		<tr>
			<td colspan=3 style="text-align:center;">
				<input type="button" value="취소" />&nbsp;<input type="button" onclick="Go_submit(this.form);" value="제출"/>
			</td>
		</tr>
	</table>
	<div>
		<span>

		</span>
	</div>
	<input type="hidden" id="id_hidden" />
</form>
<script>

</script>
</body>
</html>