<!DOCTYPE HTML>
<html>
<?php
	session_start();
	 if($_SESSION['is_login']==true){
	 	header('Location: ../index.php');
	 }
?>
<head>
	<script src="http://code.jquery.com/jquery-1.6.2.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script type='text/javascript'>
		
	//form=loginForm / id=id / pw=pw / checkbox=Save_id
		window.onload=function() {
			if(getCookie("id")){
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


	///////////////////////////////////////////////////////////////////////////////////////////////////////
		function Popup(Search){
			var popOption="width=370, height=360, resizable=no, scrollbars=no, status=no;";
			window.open(Search,"",popOption);
		}
	</script>
	<meta charset="utf-8" />
	<title>Login</title>
</head>
<body>
	<H2>Login</H2>
	<hr style="color:skyblue; background-color:skyblue; height:5px; border:none;" />
	<form action='login_proc.php' method='POST' name='loginForm'>
		<table cellspacing='10' border='0'>
			<tr>
				<td>ID</td><td><input type='text' maxlength='12' id='id' name='id' class='text' /></td>
				<td rowspan='2'><input type='button' value='Login' class='text' onclick='login_cookie();'></td>
			</tr>
			<tr>
				<td>PW</td><td><input type='password' maxlength='15' id='pw' name='pw' class='text' /></td>
			</tr>
			<tr>
				<td align='left' valign='middle'><input type='checkbox' name='Save_id' />Save ID</td>
				<td colspan='2' align='right' valign='middle'><a href="javascript:Popup('Search_id.php')">
				Search_ID</a> / <a href="javascript:Popup('Search_pw.php')">
				Search_PW</a></td>
			</tr>
			<tr>
				<td colspan='2' align='left'>Not yet Register?</td>
				<td align='right'><a href='./Terms_Use.html'>Register</a></td>
			</tr>
		</table>
</form>
</body>
</html>