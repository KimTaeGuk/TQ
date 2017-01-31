<?php
	session_start();
	if(!$_SESSION['id']){
		echo "<script>
			alert('No ID');
			history.go(-1);
			</script>";
		return false;
	}
	require_once('../config/db_connect.php');
	$sql="select * from buy where ID='$_SESSION[id]'";
?>
<!DOCTYPE HTML>
<html>
<head>
<title></title>
	<style>
		div  * {position: absolute;}
		
		.Container {
			border:1px solid black; 
			width:820px; 
			height:100px; 
			margin:10px 10px;
		}	
			.Container:hover{
				border: 3px solid skyblue;
			}

			.Container > * {
				display: inline-block;
			}

		div .image {
			height:100px;
			width:100px;
		}

		div .Explain {
			width:600px;
			height:100px;
			margin:0px 0px 0px 110px;
		}
		div .Price{
			width:100px;
			height:100px;
			margin:0px 0px 0px 720px;
		}
		img{
			width:100%;
			height:100%;
		}
	</style>
</head>
<body>
<?php
	if($result=$con->query($sql)){
		while($row=$result->fetch_assoc()){
			$img="../Upload_img/".$row[Image];
			$Opt=explode(";",$row[Options]);
			$Total_price=$row[Price]+$Opt[1];

?>	
<nav>
	<div class="Container">
		<div class="image"><img src="<?=$img?>" /></div>
		<div class="Explain"><?=$row[Goods_name]?></div>
		<div class="Price"><?=$Total_price?></div> 
	</div>
</nav>
<?php		}

	}
?>
</body>
</html>