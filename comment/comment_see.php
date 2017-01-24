<!DOCTYPE HTML>
<HTML>
<HEAD>
	<TITLE></TITLE>
	<style>
		td{
			border:1px solid black;
		}
	</style>
</HEAD>
<BODY>
<table>
<?php
	require_once('../config/db_connect.php');
	$sql="select * from comment where board_num=$_POST[board_num] && comment_num=$_POST[comment_num] && comment_depth=2";

	if($result=$con->query($sql)){
		while($row=$result->fetch_assoc()){
			printf ("<tr><td>[%s]</td><td>[%s]</td><td><a href='../comment/coco_delete.php?num=$row[comment_comment]'>delete</a> / <a href='../comment/coco_modify.php?num=$row[comment_comment]'>modify</a></td></tr><br>",$row["comment_id"],$row["comment_content"]);
		}
	}
?>
</table>
</BODY>
</HTML>