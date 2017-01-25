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
	window.onload=function(){}
		function co_comment(num){
			if(document.getElementById("Co_Div")){}	
			else {
				var comment_Div=document.getElementById("comment_Div"+num);
				
				var x=document.createElement("TEXTAREA");
				x.setAttribute('id',"Co_Div");
				x.setAttribute('name',"Co_Div");

				var Comment_btn=document.createElement("input");
				Comment_btn.setAttribute('type',"button");
				Comment_btn.setAttribute('value',"C_btn");
				Comment_btn.setAttribute('onclick','href_coco('+num+')');

				var Close_btn=document.createElement("input");
				Close_btn.setAttribute('type',"button");
				Close_btn.setAttribute('value',"Cancle");
				Close_btn.setAttribute('onclick','rm_coco('+num+')');

				comment_Div.appendChild(x);
				comment_Div.appendChild(Comment_btn);
				comment_Div.appendChild(Close_btn);
			}
		}

		function rm_coco(num){
			var comment_Div=document.getElementById("comment_Div"+num);
			while(comment_Div.hasChildNodes()){
				comment_Div.removeChild(comment_Div.firstChild);
			}
		}

		function href_coco(num){
			var comment_num=document.getElementById("comment_num");
			comment_num.setAttribute('value',(num+1));
			$('#co_co_form').submit();
		}

	</script>

	<style>
		th{border:1px solid skyblue;}
	</style>
</HEAD>
<BODY>
<form action="../comment/comment_comment_proc.php" method="POST" id="co_co_form">
	<input type="hidden" value="<?=$_SESSION[id]?>" name="id">
	<input type="hidden" value="<?=$row[num]?>" name="board_num">
	<input type="hidden" value="" name="comment_num" id="comment_num">

<!-- 댓글 -->
	<table>
	<tr>
	<?php
		echo "<th>".$row[num]."</th><th>".$row[title]."</th><th>".$row[id]."</th><th>".$row[date]."</th><th>".$count."</th></tr>";
		echo "<tr><th colspan='5'>".$row[content]."</th></tr>";

		$sql="select * from comment where board_num=$row[num] && comment_depth=1";
		$result=$con->query($sql);

		$num_row=$result->num_rows;
		
		for($i=0; $i<$num_row;$i++){
			$comment_id[$i]=mysql_result($result,$i,comment_id);
			$comment_content[$i]=mysql_result($result,$i,comment_content);
		}
	?>

<!-- 수정 및 삭제 -->
	</tr>
	<tr><th colspan=5><a href='./Board_delete.php?num=<?=$row[num]?>&&title=<?=$row[title]?>'>Delete</a></th></tr>
	<tr><th colspan=5><a href='./Board_modify.php?num=<?=$row[num]?>&&title=<?=$row[title]?>'>Modify</a></th></tr>
	<tr><th colspan=5>---------------------------------------------------------</th></tr>
	</table>

<!-- 대댓글 -->
	<table>
	<?php
		for($x=0;$x<$num_row;$x++){
		echo "<tr><th>ID : </th><th>".$comment_id[$x]."</th><th><input type='button' value='답글' id='coco' onclick='co_comment($x);'></th><th><a href='../comment/comment_modify.php?num=$row[num]&&content=$comment_content[$x]'>Modify</a></th><th><a href='../comment/comment_delete.php?num=$row[num]&&content=$comment_content[$x]&&comment_num=$x'>Delete</a></th></tr>
			<tr><th>내용</th><th colspan=3>".$comment_content[$x]."</th><th><input type=button id='coco_see' onclick='co_see($x);' value='댓글'></th></tr><tr><th colspan=5><div id='comment_Div$x'></div></th></tr><tr><th colspan=5><div id='coco_see$x'></div></th></tr>";
		}
	?>
	</table>
</form>


<!-- 댓글달기 -->
	<form action="../comment/Board_comment_proc.php" method="POST">
		<input type="hidden" value="<?=$_SESSION[id]?>" name="id">
		<input type="hidden" value="<?=$row[num]?>" name="board_num">
		<table>
			<tr><td>Content</td><td><textarea name="comment_content"></textarea></td></tr>
			<tr><td colspan="2" align="center"><input type="submit" value="submit"></td></tr>
		</table>
	</form>

<!-- Ajax -->
	<script>
	function co_see(num){
		var board_num="<?=$row[num]?>";
		var comment_num=(num+1);
		$.ajax({
			type:'POST',
			url:'../comment/comment_see.php',
			data:{
				board_num:board_num,
				comment_num:comment_num
			},
			dataType:'html',
			success:function(data){
				$('#coco_see'+num).html(data);
			}
		})
	}	
	</script>
</BODY>
</HTML>