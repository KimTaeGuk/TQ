<?php
//////////////////////////////////// Board_Paging //////////////////////////////////// 
// onePage, oneSection, url
function Paging(){
	if(isset($_GET['page']))	$page=$_GET['page'];
	else $page=5;

	$onePage=2;
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
	
	$sql="select * from board ".$sqlLimit;
	$result=$con->query($sql);
	echo $sql;
}
//////////////////////////////////// Paging_End ////////////////////////////////////
?>