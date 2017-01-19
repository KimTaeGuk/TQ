<?php
	require_once('../config/db_connect.php');
	require_once('../config/mysql_result.php');

	$sql="update board set count=count+1 where num='$_GET[num]' && title='$_GET[title]'";
	$result=$con->query($sql);
	
	$sql="select * from board where num='$_GET[num]' && title='$_GET[title]'";
	$result=$con->query($sql);
	$row=$result->fetch_assoc();
	$count=$row[count];
?>
<!DOCTYPE HTML>
<HTML>
<HEAD>
<TITLE>Board_See</TITLE>
<style>
	th{
		border:1px solid skyblue;
	}
</style>
</HEAD>
<BODY>
<table>
<tr>
<?php
	echo "<th>".$row[num]."</th><th>".$row[title]."</th><th>".$row[id]."</th><th>".$row[date]."</th><th>".$count."</th></tr>";
	echo "<tr><th colspan='5'>".$row[content]."</th></tr>";
?>
</tr>
<tr><th colspan=5><a href='./Board_delete.php?num=<?=$row[num]?>&&title=<?=$row[title]?>'>Delete</a></th></tr>
<tr><th colspan=5><a href='./Board_modify.php?num=<?=$row[num]?>&&title=<?=$row[title]?>'>Modify</a></th></tr>
</table>
</BODY>
</HTML>