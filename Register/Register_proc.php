<?php
  if(!$_POST['id']){
    echo("
      <script>
        alert('아이디가 없습니다.');
        history.go(-1);
      </script>
    ");
    exit;
  }
  if(!$_POST['pw']){
    echo("
      <script>
        alert('비밀번호가 없습니다.');
        history.go(-1);
      </script>
    ");
    exit;
  }
  if(strlen($_POST['pw'])<6 || strlen($_POST['pw'] >15)){
    echo ("
      <script>
        alert('Plz, Password is from 6 to 15');
        history.go(-1);
      </script>
    ");
    exit;
  }
  if(!$_POST['Re_pw']){
    echo("
      <script>
        alert('Re_비밀번호가 없습니다.');
        history.go(-1);
      </script>
    ");
    exit;
  }
  if($_POST['pw']!=$_POST['Re_pw']){
    echo("
      <script>
        alert('Re_pw is not matching with pw.');
        history.go(-1);
      </script>
      ");
    exit;
  }
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

  $birthday=$_POST["birthYear"].$_POST["birthMonth"].$_POST["birthDay"];
  $Birth = (int)$birthday;

 include('../config/db_connect.php');

  $sql="select * from Members";
  $result=$con->query($sql);
  $num_row=$result->num_rows;

  if(!$num_row){$num_row=1;} 
  else {$num_row+=1;}

    mysqli_query($con, "insert into Members(count,id,pw,name,birth) values ($num_row ,'$_POST[id]','$_POST[pw]','$_POST[name]','$Birth')");
     mysqli_close($con);
     header('Location: ../index.php');  
?>