<?php
	if(!$_POST['name']){
		echo "<script>
			alert('No ID');
			</script>";
		return false;
	}	
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

	$sql = "select * from board";
	$result=$con->query($sql);

	$num_row=$result->num_rows;

	if(!$num_row){$num=1;}
	else{$num=$num_row+1;}
	
	$sql="insert into board(num, id,title,content,count,date,star,kategory) values ($num, '$_POST[id]','$_POST[title]','$_POST[content]',0,'$date',$_POST[star],'$_POST[name]')";
	$con->query($sql);

	Header("Location: ./Board_list.php");
	$result->free();
	$con->close();
?>