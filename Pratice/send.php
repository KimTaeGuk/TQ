<?php
	header("Content-type: text/plain; charset=UTF-8");
	if(isset($_POST['request'])){ echo $_POST['request']; }
	else { echo "The parameter of 'request' is not found."; }
?>