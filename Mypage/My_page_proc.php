<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script>
		function pw_chk(){
			if("<?=$_SESSION['pw']?>"==document.getElementById("pw").value){
				document.getElementById("fr").submit();
			}	else{
				alert(document.getElementById("pw").value);
			}
		}
	</script>
</head>
<body>
<form action="./My_page.php" method="POST" id="fr">
본인 확인을 위해 비밀번호를 입력해 주십시오.<br>
<input type="password" name="pw" id="pw"/><input type="button" onclick="pw_chk();" value="submit"/>
</form>
</body>
</html>