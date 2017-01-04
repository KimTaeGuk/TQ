<?php
	include("../config/db_connect.php");
	include("../config/mysql_result.php");
  
  if(!$_POST['id']){
    echo("
      <script>
        alert('아이디가 없습니다.');
        history.go(-1);
      </script>
    ");
    exit;
  }
  
  if($_POST['birthYear']=="Year" || $_POST['birthMonth']=="Month" || $_POST['birthday']=="Day"){
    echo("
      <script>
        alert('birth is Null');
        history.go(-1);
      </script>
      ");
    exit;
  }
	$birthday=$_POST['birthYear'].$_POST['birthMonth'].$_POST['birthDay'];
	$Birth=(int)$birthday;
	$result=mysqli_query($con, "select * from Members where birth='$Birth' && id='$_POST[id]'");
	$DB_pw=mysql_result($result,0,"pw");

	if(!isset($DB_pw)){
		echo($_POST[id].$Birth);
	exit;
	}
	else {echo "pw : ".$DB_pw;}
	mysqli_close($con);
?>