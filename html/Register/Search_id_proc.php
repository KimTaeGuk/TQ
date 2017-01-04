<?php
	include("../config/db_connect.php");
	include("../config/mysql_result.php");

  if(!$_POST['name']){
    echo("
      <script>
        alert('이름이 없습니다.');
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
	$result=mysqli_query($con, "select * from Members where birth='$Birth' && name='$_POST[name]'");
	$DB_id=mysql_result($result,0,"id");

	if(!isset($DB_id)){
		echo($_POST[name].$Birth);
	exit;
	}
	else {echo "ID : ".$DB_id;}
	mysqli_close($con);
?>