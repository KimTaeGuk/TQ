<?php
	if(!$_POST['id']){
		echo "<script>
			alert('No ID');
			</script>";
		return false;
	}	
	if(!$_POST['title']){
		echo "<script>
			alert('No title');
			history.go(-1);
			</script>";
		return false;
	}
	if(!$_POST['content']){
		echo "<script>
			alert('No content');
			history.go(-1);
			</script>";
		return false;
	}
	$date=date('Y-m-d H:i:s');
	require_once('../config/db_connect.php');
	$sql="insert into board(id,title,content,count,date) values ('$_POST[id]','$_POST[title]','$_POST[content]',0,'$date')";
	$con->query($sql);

	Header("Location: ./Board_list.php");
	$result->free();
	$con->close();
?>