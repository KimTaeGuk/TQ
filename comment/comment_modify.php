<?php
	session_start();
	require_once("../config/db_connect.php");
	$sql="select * from comment where board_num='$_GET[num]' && comment_content='$_GET[content]'";
	$result=$con->query($sql);
	$row=$result->fetch_assoc();
?>

<!DOCTYPE HTML>
<HTML>
<HEAD><TITLE></TITLE></HEAD>
<BODY>
	<form action="comment_modify_proc.php" method="POST">
		<input type="hidden" value="<?=$_GET[num]?>" name="num">
		<input type="hidden" value="<?=$_SESSION[id]?>" name="id">
		<table>
			<tr><td>Content</td><td><textarea name="content"><?=$_GET[content]?></textarea></td></tr>
			<tr><td colspan="2" align="center"><input type="submit" value="submit"></td></tr>
		</table>
	</form>
</BODY>
</HTML>