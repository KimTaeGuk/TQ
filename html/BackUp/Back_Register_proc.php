<?php
  if(!$_POST['id']){
    echo("
      <script>
        alert('아이디가 없습니다.');
        history.go(-1);
      </script>
    ");
  }
  if(!$_POST['pw']){
    echo("
      <script>
        alert('비밀번호가 없습니다.');
        history.go(-1);
      </script>
    ");
  }
  if(!$_POST['name']){
    echo("
      <script>
        alert('이름이 없습니다.');
        history.go(-1);
      </script>
    ");
  }
$birthday=$_POST["birthYear"].$_POST["birthMonth"].$_POST["birthDay"];
$Birth = (int)$birthday;

include('../config/db_connect.php');

    mysqli_query($con, "insert into Members(id,pw,name,birth) values ('$_POST[id]','$_POST[pw]','$_POST[name]','$Birth')");
    mysqli_close($con);
    //header('Location: ../index.php');  
?>

<HTML>
<head><title></title>
<script>
  window.onload=function() {
    var pw=".$pw.";

    if(pw.length >=7 && pw.length <=12){
      for(var i=0; i<pw.length;i++){
       var ch=pw.charAt(i);
        if(!ch.match(/([a-zA-Z0-9])/)){
          if(ch.match(/([!,@,#,%,&])/)){}
          else {
            alert('Error'+i+ ' : '+ch);
            history.back(1);   //////////////////Error//////////////////
          } //else
        } //if
      } //for
    } //if
    else{
      window.alert('from 7 to 15.');
      history.back(1);
    } //else
  };  //window.onload
</script>
</head>
<body>

</body>
</HTML>

<?php
   echo("
    <script>
      var pw='".$_POST['pw']."';

      for(i=0; i<pw.length; i++){
        var ch=pw.charAt(i);
          if(!ch.match(/([a-zA-Z0-9])/)){
            if(ch.match(/([!,@,#,%,&])/)){}
              else{
                alert('Do not use Speacial Char except (!,@,#,%,&)');
                history.go(-1);
              }
          }        
      }
    </script>
  ");
?>