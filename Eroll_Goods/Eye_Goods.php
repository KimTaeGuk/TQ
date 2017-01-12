<?php	
	include('../config/db_connect.php');
	include('../config/mysql_result.php');

	$sql="select * from Goods where kategorie='Spring' && Sub_kategorie='Warm'";
	$result=$con->query($sql);

	if($result->num_rows > 0){
		while($row=$result->fetch_assoc()){
			$image = explode(";",$row["image"]);
			if($row["Options"]==null){}
			else {}
		}
	}	else {}

?>
<!DOCTYPE HTML>
<HTML>
<HEAD>
	<TITLE></TITLE>
	<script src="../js/Goods_Shopping.js"></script>
	<link rel="stylesheet" href="../css/Goods_Shopping.css">
	<script>
		
	</script>
</HEAD>
<BODY>
<center>
<form name="Shopping" method="get" action="Shopping_proc.php" enctype="multipart/form-data" />
	<div style="width:1000px; height:1500px;">

	</div>
</form>


</center>
</BODY>
</HTML>
<?php		
	$result->free();
	$con->close();
?>