<?php
	session_start();

	require_once("../config/db_connect.php");
	$sql="select * from Members where id='$_SESSION[id]' && pw='$_SESSION[pw]'";
	$result=$con->query($sql);
	$row=$result->fetch_assoc();
?>
<!DOCTYPE HTML>
<HTML>
<HEAD>
	<TITLE></TITLE>
	<style>
		td{border:1px solid black;}
	</style>
</HEAD>
<BODY>
	<table>
		<tr><td colspan=2><a href="./secession.php">Secession</a></td></tr>	<!-- Secession -->
		<tr><td>ID</td><td><?=$row[id]?></td></tr>	<!-- ID -->
		<tr><td colspan=2><a href="./password_change.php">Password Change</a></td></tr>	<!-- Password Change-->
		<tr><td>Name</td><td><?=$row[name]?></tr>	<!-- Name -->
		<tr><td>Birth</td><td><?=substr($row[birth],0,4)?>년 <?=substr($row[birth],4,6)?>월 <?=substr($row[birth],6,8)?>일</td></tr>	<!-- Birth -->
		<tr><td colspan=2><a href='../index.php'>Confirm</a></td></tr>	<!-- Confirm -->
	</table>
</BODY>
</HTML>