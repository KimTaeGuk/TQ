<?php
	$Search=$_GET[Search];

	require_once("../config/db_connect.php");
	require_once("../config/mysql_result.php");

	$sql="select * from board where title like '%$Search%'||content like '%$Search%'||id like '%$Search%'";
	$result=$con->query($sql);
	$row=$result->fetch_assoc();
	$num_row=$result->num_rows;

		for($i=0;$i<$num_row;$i++){
		$num[$i]=mysql_result($result,$i,num);
		$id[$i]=mysql_result($result,$i,id);
		$title[$i]=mysql_result($result,$i,title);
		$content[$i]=mysql_result($result,$i,content);
		$count[$i]=mysql_result($result,$i,count);
		$date[$i]=mysql_result($result,$i,date);	
	}
?>
<!DOCTYPE HTML>
<HTML>
<HEAD>
<TITLE>Board Search</TITLE>
<script>
	function search_go(){
		s=document.getElementById("Search");
		location.href="./Board_Search.php?Search="+s.value;
	}
</script>
<style>
	th {
		border:1px solid black;
		width:100px;
	}
</style>
</HEAD>
<BODY>
<table style="border:1px solid black;">
<thead>
	<tr>
		<th>No. </th>
		<th>Title </th>
		<th>Id </th>
		<th>Count </th>
		<th>Date</th>	
	</tr>
</thead>
<tbody>
<?php
	for($x=0;$x<$num_row;$x++){
		echo "<tr><th>".$num[$x]."</th><th style='width:500px'><a href='./Board_See.php?num=$num[$x]&title=$title[$x]'>".$title[$x]."</th><th>".$id[$x]."</th><th>".$count[$x]."</th><th>".$date[$x]."</th></tr>";
	}
?>
</tbody>
<tfoot>
<tr>
<th colspan=4><input type="text" name="Search" id="Search" />
<input type="submit" name="Se_btn" value="Search" onclick="search_go();" ></th>
<th><input type="button" value="write" onclick="javascript:location.href='./Board_write.php'"/></th>
</tr>
</tfoot>
</table>
</BODY>
</HTML>