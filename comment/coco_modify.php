<!DOCTYPE HTML>
<HTML>
<HEAD><TITLE></TITLE>
</HEAD>
<BODY>
<?php
	session_start();
	require_once("../config/db_connect.php");
	$comment_comment=$_POST[board_num]."_".$_POST[comment_num]."_".$_POST[coco_num];
	$sql="select comment_content from comment where comment_comment='$comment_comment'";

	if($result=$con->query($sql)){
		$row=$result->fetch_assoc();

	}	else {
		echo "Fail";
	}
?>
<input type="hidden" value="<?=$comment_comment?>" name="num">
		<table>
			<tr><td><textarea name="content"><?=$row[comment_content]?></textarea></td></tr>
			<tr><td align="center"><input type="button" value="submit" onclick="coco_modify_submit();"></td></tr>
		</table>
</BODY>
</HTML>