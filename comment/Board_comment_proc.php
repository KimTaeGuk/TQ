<?php
	require_once('../config/db_connect.php');
	
	$sql="select * from comment";
	$result=$con->query($sql);

	$num_row=$result->num_rows;

	if(!$num_row){$num=1;}	
	else{$num=$num_row+1;}

	$sql="insert into comment values($_POST[board_num],$num,'$_POST[id]',0,'$_POST[comment_content]')";
	$result=$con->query($sql);
	if($result){
		echo "Success";
	}	else {
		echo "Failure";
	}
?>