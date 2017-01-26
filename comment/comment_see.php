<!DOCTYPE HTML>
<HTML>
<HEAD>
	<TITLE></TITLE>
<!-- Style -->
	<style>
		div{
			border:1px solid black;
			display: inline-block;
		}
	</style>
<!-- Script -->
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script>
	
	</script>
</HEAD>
<BODY>
<?php
	require_once('../config/db_connect.php');
	$sql="select * from comment where board_num=$_POST[board_num] && comment_num=$_POST[comment_num] && comment_depth=2";
	if($result=$con->query($sql)){
		$count=1;	# Count for each comment
		while($row=$result->fetch_assoc()){
			printf ("<div>%s</div><div><a href='../comment/coco_delete.php?num=$row[comment_comment]'>delete</a> / <a href='#' onclick='coco_modify($row[comment_num],$count);'>modify</a></div><br><div id='content_$row[comment_num]_$count'>%s</div><br>",$row["comment_id"],$row["comment_content"]);
			$count++;
		}
	}
?>
</BODY>
</HTML>