<?php	
	include('../config/db_connect.php');
	include('../config/mysql_result.php');

	$sql="select * from Goods where kategorie='Spring' && Sub_kategorie='Warm'";
	$result=$con->query($sql);

	if($result->num_rows > 0){
		while($row=$result->fetch_array()){
			//$img=explode(";",$row[image]);	#Array_Image
		}
	}	else {};
	
	$num_row=$result->num_rows;

	for($count=0;$count<$num_row;$count++){
		$Goods_name[$count]=mysql_result($result,$count,Goods_name);
		$Sub_explain[$count]=mysql_result($result,$count,Sub_explain);
		$Price[$count]=mysql_result($result,$count,Price);
		$Options[$count]=mysql_result($result,$count,Options);
		$Options_price[$count]=mysql_result($result,$count,Options_price);
		$image[$count]=mysql_result($result,$count,image);
		//자바 배열에 넣기위해 이중배열로 만드는 반복문
		for($count2=0;$count2<count(explode(";",$image[$count]));$count2++){
			$img[$count]=explode(";",$image[$count]);
		}
	}
?>
<!DOCTYPE HTML>
<HTML>
<HEAD>
	<TITLE></TITLE>
	<script src="../js/Goods_Shopping.js"></script>
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>		<!-- jQuery -->
	<link rel="stylesheet" href="../css/Goods_Shopping.css">
	<script>
	//자바배열로 바로 옮겨주는 json_encode
	var img=<?php echo json_encode($img) ?>;
	</script>
</HEAD>
<BODY>
<center>
<form name="Shopping" method="get" action="Shopping_proc.php" enctype="multipart/form-data" />

</form>
</center>
</BODY>
</HTML>
<?php		
	$result->free();
	$con->close();
?>