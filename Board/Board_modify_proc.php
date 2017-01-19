<?php
	session_start();
	
	require_once("../config/db_connect.php");
	require_once("../config/mysql_result.php");

	echo $_POST[num];
	echo $_POST[title];
	echo $_POST[content];
	$sql="update board set title='$_POST[title]', content='$_POST[content]' where num='$_POST[num]' && id='$_SESSION[id]'";
	$result=$con->query($sql);
	header('location: ./Board_list.php');
?>