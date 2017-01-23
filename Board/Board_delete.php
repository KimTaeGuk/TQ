<?php
 require_once("../config/db_connect.php");
echo $_GET[num];
echo  $_GET[title];

//글 삭제
$sql="delete from board where num='$_GET[num]' && title='$_GET[title]'";
$result=$con->query($sql);

//글 목록 번호들 당기기
$sql="update board set num=num-1 where num>'$_GET[num]'";
$result=$con->query($sql);

header('location: ./Board_list.php');
?>