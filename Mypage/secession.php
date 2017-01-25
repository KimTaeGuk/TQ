<?php
 	require_once("../config/db_connect.php");
 	session_start();

 	$sql="select * from Members where id='$_SESSION[id]' && pw='$_SESSION[pw]'";
 	if($result=$con->query($sql)) {
 		$row=$result->fetch_assoc();
 		$count=$row[count];
 	}
 	$sql="delete from Members where count='$count'";
 	$result=$con->query($sql);

 	$sql="update Members set count=count-1 where count>'$count'";
	$result=$con->query($sql);

	session_destroy();

	header('location: ../index.php');
?>
<!DOCTYPE HTML>
<HTML>
<HEAD>
	<TITLE></TITLE>

</HEAD>
<BODY>

</BODY>
</HTML>