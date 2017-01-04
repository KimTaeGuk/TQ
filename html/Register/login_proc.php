<?php

session_start();
include("../config/db_connect.php");
include("../config/mysql_result.php");


 $result=mysqli_query($con, "select * from Members where id='$_POST[id]' && pw='$_POST[pw]'");
 $DB_id=mysql_result($result,0,"id");
 $DB_pw=mysql_result($result,0,"pw");

 printf ($_POST['id']);
 printf ($_POST['pw']);
 printf ($DB_id);
 printf ($DB_pw);
 
 if(($_POST['id']!=null)&&($_POST['pw']!=null)){
 		$_SESSION['id']=$_POST['id'];
 		$_SESSION['pw']=$_POST['pw'];
		 printf ($_POST['id']);
		 printf ($_POST['pw']);
		 printf ($DB_id);
		 printf ($DB_pw);
		 printf ($_SESSION['id']);
		 printf ($_SESSION['pw']);

 	if(($_SESSION['id']==$DB_id)&&($_SESSION['pw']==$DB_pw)){
		$_SESSION['is_login']=true;
 		echo ("<script>alert('Success');</script>");
 		header('Location:../index.php');
	}	else {
 		echo ("<script>alert('Wrong ID or PW');</script>");
 		header('Location: ./login.php');
 	}
} else {
 	echo ("<script>alert('NULL ID or PW');</script>");
 	header('Location: ./login.php');
}

?>