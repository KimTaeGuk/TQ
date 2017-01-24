<?php
	require_once('../config/db_connect.php');

	$co_co=$_POST[board_num]."_".$_POST[comment_num];
	echo $co_co."<br>";

	//갯 수 증가
	$sql="select * from comment where comment_comment like '$co_co%'";
	if($result=$con->query($sql)){
		$num_row=$result->num_rows;
		if(!$num_row){$co_co=$co_co."_1";}
		else{
			$num_row+=1;
			$co_co=$co_co."_".$num_row;
			echo $co_co;
		}		
	}

	 $sql="insert into comment values($_POST[board_num],$_POST[comment_num],'$_POST[id]',2,'$_POST[Co_Div]','$co_co')";

	 if($result=$con->query($sql)){echo "Success";}
	 else {echo "Failure";}
?>
<!DOCTYPE HTML>
<HTML>
<HEAD>
<TITLE></TITLE>
</HEAD>
<BODY>
<ul>
	<li>A</li>
	<li>
		<ul>
			<li>B</li>
			<li>C</li>
		</ul>
	</li>
</ul>
</BODY>
</HTML>