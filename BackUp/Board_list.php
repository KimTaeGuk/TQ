<?php
	require_once('../config/db_connect.php');
	require_once('../config/mysql_result.php');

	$sql="select * from board";
	$result=$con->query($sql);

	$num_row=$result->num_rows;
?>
<!DOCTYPE HTML>
<HTML>
<HEAD><TITLE>Board_list</TITLE>
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
	while($row=$result->fetch_assoc()){
		echo "<tr><th>".$row[num]."</th><th style='width:500px'><a href='./Board_See.php?num=$num[$x]&title=$title[$x]'>".$row[title]."</th><th>".$row[id]."</th><th>".$row[count]."</th><th>".$row[date]."</th></tr>";
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