<!DOCTYPE HTML>
<HTML>
<HEAD><TITLE>Board_list</TITLE>
<?php
	require_once('../config/db_connect.php');
	require_once('../config/mysql_result.php');

	if(empty($_POST[name])){
		$sql="select * from board";
	}
	else {
		$sql="select * from board where kategory='$_POST[name]'";
	}

	$result=$con->query($sql);
	$num_row=$result->num_rows;

//////////////////////////////////// Board_Paging //////////////////////////////////// 
// onePage, oneSection, url
	if(isset($_GET['page']))	$page=$_GET['page'];
	else $page=1;

	$onePage=10;
	$allPage=ceil($num_row/$onePage);

	if($page < 1 && $page > $allPage)	exit;

	$oneSection=2;
	$currentSection=ceil($page/$oneSection);
	$allSection=ceil($allPage/$oneSection);

	$firstPage=($currentSection * $oneSection) - ($oneSection - 1);

	if($currentSection == $allSection)	$lastPage=$allPage;
	else 	$lastPage=$currentSection * $oneSection;

	$prevPage=(($currentSection-1) * $oneSection);
	$nextPage=(($currentSection+1) * $oneSection)-($oneSection-1);

	$paging='<ul>';

	if($page != 1)						$paging .='<li><a href="./Board_list.php?page=1">First</a></li>';
	if($currentSection != 1)				$paging .='<li><a href="./Board_list.php?page='.$prevPage.'">Prev</a></li>';

	for($i=$firstPage;$i<=$lastPage;$i++){
	 	if($i==$page)					$paging.='<li>'.$i.'</li>';
	 	else 							$paging.='<li><a href="./Board_list.php?page='.$i.'">'.$i.'</a></li>';
	}

	if($currentSection != $allSection)	$paging.='<li><a href="./Board_list.php?page='.$nextPage.'">Next</a></li>';
	if($page!=$allPage)					$paging.='<li><a href="./Board_list.php?page='.$allPage.'">End</a></li>';
	
	$paging.='</ul>';

	$currentLimit=($onePage * $page)-$onePage;
	$sqlLimit='limit '.$currentLimit.','.$onePage;

	$result=$con->query($sql);
	$num_row=$result->num_rows;

	if(empty($_POST[name])){
		$sql="select * from board";
	}	else {
	$sql="select * from board where kategory='$_POST[name]' ".$sqlLimit;
	}
	$result=$con->query($sql);
//////////////////////////////////// Paging_End ////////////////////////////////////
?>

<script>
	function search_go(){
		s=document.getElementById("Search");
		location.href="./Board_Search.php?Search="+s.value;
	}

	function viewfuc(co_num, co_str){













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
		<th>Star</th>
	</tr>
</thead>
<tbody>
<!-- <a href='../Board/Board_See.php?num=$row[num]&title=$row[title]'>
 --><?php
	while($row=$result->fetch_assoc()){
		echo "<tr id=Comment_".$row[num]." onclick='viewfuc(\"".$row[title]."\", $row[num])'><th>".$row[num]."</th><th style='width:500px'>".$row[title]."</th><th>".$row[id]."</th><th>".$row[count]."</th><th>".$row[date]."</th><th>";
		switch($row[star]){
			case 1:
				echo "★";
				break;
			case 2:
				echo "★★";
				break;
			case 3:
				echo "★★★";
				break;
			case 4:
				echo "★★★★";
				break;
			case 5:
				echo "★★★★★";
				break;
			default:
				echo "Error";
		}
		echo "</th></tr>
		<tr><th colspan=6>
			<div id='viewDiv_$row[num]'></div>
		</th></tr>";
	}
?>
</tbody>
<tfoot>
<tr>
<th colspan=4><input type="text" name="Search" id="Search" />
<input type="submit" name="Se_btn" value="Search" onclick="search_go();" ></th>
<th><input type="button" value="write" onclick="javascript:location.href='./Board_write.php'"/></th>
</tr>
<tr><td><?=$paging?></td></tr>
</tfoot>
</table>
</BODY>
</HTML>