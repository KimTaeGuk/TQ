<html>
<head>
<title>
</title>
</head>
<body>
<?php
	echo $_POST[Goods_name]."<BR>";
	echo $_POST[Price]."<BR>";
	echo $_POST[image]."<BR>";
	echo $_POST[Quantity]."<BR>";
	$Opt_price=explode(";",$_POST[Opt_pri]);

	require_once('../config/db_connect.php');

	$date=date('Y-m-d H:i:s');
	$sql="insert into Basket values('$_POST[Goods_name]',$_POST[Price],'$_POST[image]',$_POST[Quantity],'$_POST[Opt_pri]','$date')";

	if($result=$con->query($sql)){
?>
		<script>
			var Go=confirm("would u go to Basket Page?");
			if(Go==true){
				location.replace("./Basket_list.php");
			}	else {
				location.replace("../Eroll_Goods/Eye_Goods.php");
			}
		</script>
<?php
	}	else {
?>
		<script>
			alert("Fail");
		</script>
<?php
	}
?>
</body>
</html>
