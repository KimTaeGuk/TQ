<?php
session_start();
	require_once("../config/db_connect.php");
	require_once("../config/mysql_result.php");

	$sql="select * from board where num='$_GET[num]' && title='$_GET[title]'";
	$result=$con->query($sql);
	$row=$result->fetch_assoc();
?>
<!DOCTYPE HTML>
<HTML>
<HEAD>
<TITLE>Board_Modify</TITLE>
</HEAD>
<BODY>
<form action="Board_modify_proc.php" method="POST">
<table>
	<tr>
		<th>Title</th>
		<th><input type="text" name="title" value="<?=$row[title]?>"/></th>
	</tr>
	<tr>
		<th>Title</th>
		<th><textarea name=content><?=$row[content]?></textarea></th></tr>
	<tr>
		<th><input type="submit" value="Submit"></th>
		<th><input type="reset" value="reset"></th>	
	</tr>
</table>
<input type="hidden" name=num value="<?=$row[num]?>" />
</form>
</BODY>
</HTML>