<?php
	function mysql_result($result, $number, $field){
		mysqli_data_seek($result, $number);
		$row=mysqli_fetch_array($result);
		return $row[$field];
	}
?>