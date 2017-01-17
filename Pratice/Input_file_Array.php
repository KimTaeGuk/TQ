<?php
?>
<html>
<head>
	<title></title>
	<script>
	function loadfiles(){
		var imgfiles=document.getElementById("img"),
		imgfiles_length=imgfiles.files.length;

		for (var i=0; i<imgfiles_length;i++){
			document.write(imgfiles.files[i].name);
		}
	}
	</script>
</head>
<body>
<input type=file id=img multiple onchange='loadfiles();'>
</body>
</html>