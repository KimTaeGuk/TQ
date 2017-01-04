<!DOCTYPE HTML>
<html>
<?php
	session_start();
	 if($_SESSION['is_login']==true){
	 	header('Location: ../index.php');
	 }
?>
<head>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script type='text/javascript'>
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
	<form action='login_proc.php' method='POST'>
		<table cellspacing='10' border='0'>
			<tr>
				<td>ID</td><td><input type='text' maxlength='12' id='id' name='id' class='text' /></td>
				<td rowspan='2'><input type='submit' value='Login' class='text' ></td>
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
				<td align='right'><a href='Register.php'>Register</a></td>
			</tr>
		</table>
</form>
	<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
	?>
</body>
</html>