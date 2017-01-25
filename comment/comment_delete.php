<?php
	require_once("../config/db_connect.php");

	echo $_GET[num]."<br>";
	echo $_GET[content]."<br>";
	$comment_num=$_GET[comment_num]+1;

//글 삭제
$sql="delete from comment where board_num='$_GET[num]' && comment_content='$_GET[content]'";
$result=$con->query($sql);

//글 목록 번호들 당기기(예정)
//$sql="update comment set comment_num=comment_num-1 where comment_num>'$comment_num'";
//$result=$con->query($sql);
?>