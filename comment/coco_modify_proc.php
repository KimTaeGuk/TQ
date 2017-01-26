<?php
	echo $_POST[content]."<br>";
	echo $_POST[num]."<br>";

	require_once("../config/db_connect.php");

	$sql="update comment set comment_content='$_POST[content]' where comment_comment='$_POST[num]'";
	if($result=$con->query($sql)){
		echo "Success";
	}	else {
		echo "Failure";
	}
?>