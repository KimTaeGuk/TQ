<?php
	session_start();
	require_once("../config/db_connect.php");
	$sql="select * from comment where board_num=$_POST[board_num] && comment_num=$_POST[comment_num] && comment_depth=1";
	$result=$con->query($sql);
	$row=$result->fetch_assoc();
?>

<!DOCTYPE HTML>
<HTML>
<HEAD><TITLE></TITLE>
</HEAD>
<BODY>
	<form method="POST">
		<input type="hidden" value="<?=$_POST[board_num]?>" name="num">
		<input type="hidden" value="<?=$_POST[comment_num]?>" name="comment_num">
		<input type="hidden" value="<?=$_SESSION[id]?>" name="id">
		<table>
			<tr><td><textarea name="content"><?=$row[comment_content]?></textarea></td></tr>
			<tr><td align="center"><input type="button" value="submit" onclick="comment_modify_submit();"></td></tr>
		</table>
	</form>
</BODY>
</HTML>