<?php
 require_once("../config/db_connect.php");
 require_once("../config/db_connect.php");
echo $_GET[num];
echo  $_GET[title];
$sql="delete from board where num='$_GET[num]' && title='$_GET[title]'";
$result=$con->query($sql);
header('location: ./Board_list.php');
?>