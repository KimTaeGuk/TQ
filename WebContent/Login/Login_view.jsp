<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>로그인 화면</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="../css/All.css">
<script src="../js/jquery-3.1.1.min.js"></script>
<script type="text/javascript">
window.onload=function() {
	if(<%=session.getAttribute("is_login")%>){
	window.location='../index.jsp';
	}if(getCookie("id")){
		document.loginForm.id.value = getCookie("id");
		document.loginForm.Save_id.checked=true;
	}
}
	
	function setCookie(name,value,expiredays){
		var today=new Date();
		today.setDate(today.getDate()+expiredays);
		document.cookie=name+"="+escape(value)+"; path=/; expires="+today.toGMTString()+";";
	}
	function getCookie(Name){
		var search=Name+"=";
		if(document.cookie.length>0){
			offset=document.cookie.indexOf(search);
			if(offset!=-1){
				offset +=search.length;
				end=document.cookie.indexOf(";",offset);
				if(end==-1){
					end=document.cookie.length;
				}
		return unescape(document.cookie.substring(offset,end));
			}
		}
	}
	function login_cookie() {
		var frm=document.loginForm;
		if(frm.Save_id.checked==true){
			setCookie("id", frm.id.value, 7);
		}	else {
			setCookie("id", frm.id.value, 0);
		}
		frm.submit();
	}
	
	function PopUp(e){
		var popOption="width=370, height=360, resizable=no, scrollbars=no, status=no;";
		window.open(e,"",popOption);
	}
	
</script>
</head>
<body>
	<H2>로그인</H2>
	<hr style="color:skyblue; background-color:skyblue; height:5px; border:none;" />
	<form action='./Login_view_proc.jsp' method='POST' name='loginForm'>
		<table cellspacing='10' border='0'>
			<tr>
				<td>ID</td><td><input type='text' maxlength='12' id='id' name='login_id' class='text' /></td>
				<td rowspan='2'><input type='button' value='Login' onclick='login_cookie();'/></td>
			</tr>
			<tr>
				<td>PW</td><td><input type='password' maxlength='15' id='pw' name='login_pw' class='text' /></td>
			</tr>
			<tr>
				<td align='left' valign='middle'><input type='checkbox' name='Save_id' id='Save_id'/>Save ID</td>
				<td colspan='2' align='right' valign='middle'>
					<input type="checkbox" name="seller" value="seller"/>판매자 로그인
					<input type="button" value="ID 찾기" onclick="javascript:PopUp('Login_search_id.jsp');" id="sch_id" />  
					<input type="button" value="PW 찾기" onclick="javascript:PopUp('Login_search_pw.jsp');" id="sch_pw" />  
				</td>
			</tr>
			<tr>
				<td colspan='2' align='left'>Not yet Register?</td>
				<td align='right'><a href='../Register/Register_sel.jsp'>Register</a></td>
			</tr>
		</table>
	</form>
</body>
</html>