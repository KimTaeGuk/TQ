<!DOCTYPE HTML>
<HTML>
<HEAD><TITLE>Header</TITLE>
	<link rel="stylesheet" type="text/css" href="../css/Head_style.css">
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>		<!-- jQuery -->

</HEAD>
<BODY>
<center>
<?php
	session_start();
	include('../config/db_connect.php');
	if($_SESSION['id']){	
		echo $_SESSION['id']."  ";
		echo "<a href='./Register/logout.php'>logout</a>";
		echo "<a href='./Mypage/Mypage.php'>My Page</a>";
		echo "<a href='../Board/Board_write.php'>Board_write</a><br>";
		echo "<a href='../comment/Board_comment.php'>Board_comment</a>";
		echo "<a href='../Mypage/My_page_proc.php'>My Page</a>";	
	}
	else {
		echo "<a href='./Register/login.php'>Login</a>   "; 
		echo "<a href='./Register/Terms_Use.html'>Register</a>";
	}

	mysqli_close($con);
?>
&nbsp;&nbsp;&nbsp;&nbsp;<a href="../Eroll_Goods/Eroll.php">Goods Erollement</a>
<a href="../Eroll_Goods/Eye_Goods.php">Eye_Goods</a>
<br /> <br /> <br /> <br />
<div style="border:1px solid;">
<ul>
	<li><a href="#">Home</a>
		<div class="dropdown-content">
			<a href="#">Link</a>
			<a href="#">Link</a>
			<a href="#">Link</a>
		</div>
	</li>
	<li class="dropdown"><a href="#news">Spring</a>
		<div class="dropdown-content">
			<a href="#">Link</a>
			<a href="#">Link</a>
			<a href="#">Link</a>
		</div>
	</li>
	<li class="dropdown"><a href="#" class="dropbtn">Summer</a>
		<div class="dropdown-content">
			<a href="#">Link</a>
			<a href="#">Link</a>
			<a href="#">Link</a>
		</div>
	</li>
	<li class="dropdown"><a href="#" class="dropbtn">Fall</a>
		<div class="dropdown-content">
			<a href="#">Link</a>
			<a href="#">Link</a>
			<a href="#">Link</a>
		</div>
	</li>
	<li class="dropdown"><a href="#" class="dropbtn">Winter</a>
		<div class="dropdown-content">
			<a href="#">Link</a>
			<a href="#">Link</a>
			<a href="#">Link</a>
		</div>
	</li>
</ul>
</div>
</center>
</BODY>
</HTML>