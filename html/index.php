<!DOCTYPE HTML>
<HTML>
<HEAD>
	<title>Main Page</title>	
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>		<!-- jQuery -->
	<script>
	$(document).ready(function(){
		$("#div_Head").load("./MainPage/Head.php");
		$("#div_Left").load("./MainPage/Left.php");
		$("#div_Container").load("./MainPage/Container.php");
		$("#div_Right").load("./MainPage/Right.php");
		$("#div_Footer").load("./MainPage/Footer.php");

		$(".btn1").click(function(){
			$("#Slide_Event").slideUp();
		});
		
		$('div').css('border','1px solid');

	<?php
		session_start();
		if($_SESSION['is_login']){
			echo ("var loginOn='".$_SESSION['is_login']."';");
		}
	?>

	if(loginOn){
		var obj=document.getElementById("floatMenu");
		obj.style.display="block"
	}
		var floatPosition=parseInt($("#floatMenu").css('top'));
		$(window).scroll(function(){
			var scrollTop=$(window).scrollTop();
			var newPosition=scrollTop + floatPosition + "px";

			/* No animation
				$("#floatMenu").css('top',newPosition);
			*/

			$("#floatMenu").stop().animate({
				"top" : newPosition
			}, 400);
		}).scroll();
	});
	</script>
	<style type="text/css">
		#floatMenu {
			position:absolute;
			width:100px;
			height:300px;
			right:300px;
			top:250px;
			background-color:#606060;
			color:#fff;
		}
	</style>
</HEAD>
<BODY>
<div id=floatMenu style="display:none;"></div>
	<center>	
		<div id="Slide_Event" style="height:100px; width:100%;">
			<button class=btn1>Up</button>
		</div>
		<div id="div_Head" style="height:150px; width:1000px;"></div>
		<div id="div_Container" style="height:1000px; width:1000px;"></div>
		<div id="div_Footer" style="height:150px; width:1000px;"></div>
	</center>
</BODY>
</HTML>