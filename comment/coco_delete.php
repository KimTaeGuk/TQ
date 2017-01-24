<?php
	require_once('../config/db_connect.php');

	$sql="delete from comment where comment_comment='$_GET[num]'";
	if($result=$con->query($sql)) echo"Delete_Success";
	else echo "Delete_Fail";
?>