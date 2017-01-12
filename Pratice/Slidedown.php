<!DOCTYPE HTML>
<HTML>
<HEAD><TITLE>Header</TITLE>
	<script src="http://code.jquery.com/jquery-1.6.2.min.js"></script>
	<script>
		$(document).ready(function(){
			$(".btn1").click(function(){
				$("p").slideUp();
			});
			$(".btn2").click(function(){
				$("p").slideDown();
			});
		});
	</script>
</HEAD>
<BODY>
<p>This is Shyyy!</p>
	<button class="btn1">Slide Up</button>
	<button class="btn2">Slide Down</button>	
</BODY>
</HTML>