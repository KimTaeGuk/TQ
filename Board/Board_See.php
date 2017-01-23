<?php
	require_once('../config/db_connect.php');
	require_once('../config/mysql_result.php');

	session_start();
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

	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script>
		function co_comment(){
			if(document.getElementById("Co_Div")){}	
			else {
				var x=document.createElement("TEXTAREA");
				var comment_Div=document.getElementById("comment_Div");
				x.id="Co_Div";
				comment_Div.appendChild(x);
			}
		}
	</script>

	<style>
		th{border:1px solid skyblue;}
	</style>
</HEAD>
<BODY>
<table>
<tr>
<?php
	echo "<th>".$row[num]."</th><th>".$row[title]."</th><th>".$row[id]."</th><th>".$row[date]."</th><th>".$count."</th></tr>";
	echo "<tr><th colspan='5'>".$row[content]."</th></tr>";

	$sql="select * from comment where board_num=$row[num]";
	$result=$con->query($sql);

	$num_row=$result->num_rows;
	
	for($i=0; $i<$num_row;$i++){
		$comment_id[$i]=mysql_result($result,$i,comment_id);
		$comment_content[$i]=mysql_result($result,$i,comment_content);
	}
?>
</tr>
<tr><th colspan=5><a href='./Board_delete.php?num=<?=$row[num]?>&&title=<?=$row[title]?>'>Delete</a></th></tr>
<tr><th colspan=5><a href='./Board_modify.php?num=<?=$row[num]?>&&title=<?=$row[title]?>'>Modify</a></th></tr>
<tr><th colspan=5>---------------------------------------------------------</th></tr>
</table>

<table>
<?php
	for($x=0;$x<$num_row;$x++){
	echo "<tr><th>ID : </th><th>".$comment_id[$x]."</th><th><input type='button' value='답글' id='coco' onclick='co_comment();'></th><th><a href='../comment/comment_modify.php?num=$row[num]&&content=$comment_content[$x]'>Modify</a></th><th><a href='../comment/comment_delete.php?num=$row[num]&&content=$comment_content[$x]'>Delete</a></th></tr>
		<tr><th>내용</th><th colspan=4>".$comment_content[$x]."</th></tr><tr><th colspan=5><div id='comment_Div'></div></th></tr>";
	}
?>
</table>

	<form action="../comment/Board_comment_proc.php" method="POST">
		<input type="hidden" value="<?=$_SESSION[id]?>" name="id">
		<input type="hidden" value="<?=$row[num]?>" name="board_num">
		<table>
			<tr><td>Content</td><td><textarea name="comment_content"></textarea></td></tr>
			<tr><td colspan="2" align="center"><input type="submit" value="submit"></td></tr>

		</table>
	</form>
</BODY>
</HTML>