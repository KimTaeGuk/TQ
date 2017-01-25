<?php
	require_once('../config/db_connect.php');
	
	if(!$_POST['id']){
		echo "<script>
			alert('No ID');
			history.go(-1);
			</script>";
		return false;
	}	

	$sql="select distinct comment_num from comment";
	$result=$con->query($sql);

	$num_row=$result->num_rows;

	if(!$num_row){$num=1;}	
	else{$num=$num_row+1;}

	$sql="insert into comment values($_POST[board_num],$num,'$_POST[id]',1,'$_POST[comment_content]',null)";
	if($result=$con->query($sql)){echo "Success";}	
	else {echo "Failure";}
?>