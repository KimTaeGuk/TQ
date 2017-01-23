<?php
	session_start();
	
	require_once("../config/db_connect.php");

	echo $_POST[num];
	echo $_POST[id];
	echo $_POST[content];
	$sql="update comment set comment_content='$_POST[content]' where board_num='$_POST[num]' && comment_id='$_POST[id]'";
	$result=$con->query($sql);
	if($result){
		echo "Success";
	}	else {
		echo "Failure";
	}
?>