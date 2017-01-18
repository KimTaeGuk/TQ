<!DOCTYPE HTML>
<HTML>
<HEAD>
	<meta charset="utf-8" />
	<TITLE>Login</TITLE>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>		<!-- jQuery -->
	<script type="text/javascript">
		$(document).ready(function(){
			//id_length_check
			$("#id").on('keyup', function(){
				if($(this).val().length >0 && $(this).val().length<=5){
					document.getElementById('Realtime_ID').innerHTML="short ID";
				} else if($(this).val().length >=10){
					document.getElementById('Realtime_ID').innerHTML="Long ID";
				} else if($(this).val().length>5 && $(this).val().length<10){
					document.getElementById('Realtime_ID').innerHTML="good ID";					
				} else if($(this).val().length ==0){
					document.getElementById('Realtime_ID').innerHTML="";
				} else {
					document.getElementById('Realtime_ID').innerHTML="worng ID";							
				}
			});
			//Check_Pw && Re_pw
			$("#Re_pw").on('keyup', function(){
				if($(this).val() == $("#pw").val()){ document.getElementById('Re_chk_pw').innerHTML="Gooooooooooood~~"; }
				else if($(this).val().length == 0){ document.getElementById('Re_chk_pw').innerHTML=""; }
				else {document.getElementById('Re_chk_pw').innerHTML="Baaaaaaaaaaaaaad~~"; }
			});
		});
	</script>
</HEAD>
<BODY>

	<H2>회원가입</H2>
	<hr style="color:skyblue; background-color:skyblue; height:5px; border:none;" />
	<form action='./Register_proc.php' method='POST'>
			<table cellspacing='10'>
					<tr>
						<td>아이디 </td>
						<td><input type='text' maxlength="12" id='id' name='id' class='text' tabindex='1' placeholder="아이디" autofocus/>
							<div id='list_ID' style="border:1px solid"></div></td>
						<td><input type='button' value='Check ID' id='idCheck_btn'></td>
						<td><Div id="Realtime_ID"></Div></td>		<!-- ID Check Button-->
					</tr>
					<tr>
						<td>비밀번호</td>
						<!-- document.getelementById('Realtime_pw').innerHTML=this.value-->
						<td><input type='password' onkeyup="document.getElementById('Realtime_pw').innerHTML=this.value" maxlength="15" name='pw' id='pw' class='text' tabindex='2' placeholder="비밀번호"/>
							<div id='list_PW' style="border:1px solid"></div></td>
						<td><input type='button' value='Check PW' id='pw_btn'></td>

						<td><div id="Realtime_pw"></div></td>
					</tr>
					<tr>
						<td>Re : 비밀번호</td>
						<td><input type='password' class='text' id='Re_pw' name='Re_pw'></td>
						<td><div id='Re_chk_pw'></div></td>
					</tr>
					<tr>
						<td>이름</td>
						<td><input type='text' name='name' class='text' tabindex='3' placeholder="이름" /></td>
					</tr>
					<tr>
						<td>생년월일</td>
						<td>
							<?php	include('./birth.php'); ?>
						 </td>
					</tr>
			</table>
			
			<center><a href='' tabindex='5'>가입취소</a><input type='submit' value='작성완료' /></center>
	</form>

	<script>
	$(function (){
	// ID Overlap Check
		$("#idCheck_btn").click(function(){
			var id=$('#id').val();
			$.ajax({
				type:'POST',
				url:'./id_chk.php',
				data:{
					id:id
				},
				dataType:'html',
				success:function(data){
					$('#list_ID').html(data);
				}//success
			});	//ajax
		});	//idCheck_btn
	// PW Check
		$("#pw_btn").click(function(){
			var pw=$('#pw').val();
			$.ajax({
				type:'POST',
				url:'./pw_chk.php',
				data:{
					pw:pw
				},
				dataType:'html',
				success:function(data){
					$('#list_PW').html(data);
				}
			})
		});	//pw_btn
	});	// Script function 
	</script>
</BODY>
</HTML>
