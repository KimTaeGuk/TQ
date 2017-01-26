<?php
	session_start();
	
	require_once("../config/db_connect.php");

	echo $_POST[board_num]."<br>";
	echo $_POST[id]."<br>";
	echo $_POST[content]."<br>";
	echo $_POST[comment_num]."<br>";
	$sql="update comment set comment_content='$_POST[content]' where board_num='$_POST[board_num]' && comment_id='$_POST[id]' && comment_depth=1 && comment_num='$_POST[comment_num]'";
	if($result=$con->query($sql)){
		echo "Success";
	}	else {
		echo "Failure";
	}
?>