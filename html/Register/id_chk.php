<?php
	include("../config/db_connect.php");

	$result=mysqli_query($con, "select * from Members where id='$_POST[id]'");

	function mysql_result($result, $number, $field) {
		mysqli_data_seek($result, $number);
		$row=mysqli_fetch_array($result);
		return $row[$field];}

	$DB_id=mysql_result($result,0,"id");
	
	echo (" 
		<script>
			var id='".$_POST['id']."';
			for (i=0;i<id.length;i++){
				var ch=id.charAt(i);
				if(!ch.match(/([a-zA-Z0-9])/)){
					document.getElementById('Speacial_Char').innerHTML='Do not use Speacial_Char';
				}
			}
		</script>
		<span id='Speacial_Char'>
	");


		if(strlen($_POST['id'])<=0){
			echo "Plz Draw Up ID.";
		}	else if(strlen($_POST['id'])<=5){
			echo "ID is short.";
		}	else if(strlen($_POST['id'])>=10){
			echo "ID is long.";
		}	else {
				if($DB_id){
					echo "OverLap ID";
				} else {
					echo "Usable ID";
				}
		}

	echo ("</span>");
	mysqli_close();
?>