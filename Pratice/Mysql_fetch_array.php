<?php
	$host='localhost';
	$user='xoox1020';
	$password='xoxo1020';
	$database='xoox1020';

	//create connection
	$con = new mysqli($host, $user, $password, $database);

	//check connection
	if($con->connect_error){
		die("Connection failed : ".$con->connect_error);
	}
	$query="select * from Goods";
	$result=$con->query($query);

	if($result->num_rows > 0) {
		while($row=$result->fetch_assoc()){
			echo $row["Goods_name"]."   ||   ".$row["Options"]."<br>";
		}
		echo $row["Options"];
	}	else {
		echo "0 results";
	}

	//mysql_result(result, number, field)
	mysqli_data_seek($result,0);
	$row=$result->fetch_assoc();
	echo $row["Goods_name"];

	$result-<free();
	$con->close();
?>