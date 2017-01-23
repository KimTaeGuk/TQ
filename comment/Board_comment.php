<?php
	session_start();
?>
<!DOCTYPE HTML>
<HTML>
<HEAD><TITLE></TITLE></HEAD>
<BODY>
	<form action="Board_comment_proc.php" method="POST">
		<input type="hidden" value="<?=$_SESSION[id]?>" name="id">
		<table>
			<tr><td>Content</td><td><textarea name="comment_content"></textarea></td></tr>
			<tr><td colspan="2" align="center"><input type="submit" value="submit"></td></tr>
		</table>
	</form>
</BODY>
</HTML>