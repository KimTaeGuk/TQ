<?php
	//가변으로 값이 바뀌도록 할려면 &을 써줘야하는것 같다
	function add_some_extra(&$string){
		$string .='and something extra. ';
	}
	$str = 'This is a string, ';
	add_some_extra($str);
	//echo $str;


	//공백일 시 값을 넣어주는 것 같다
	function mkcf($type="cappuccino"){
		return "Making a cup of $type\n";
	}
	// echo mkcf();
	// echo mkcf(null);
	// echo mkcf("espresso");

	//types은 맨 오른쪽에 있어야 한다
	function makeyogurt($flavor, $type="acidophilus"){
		return "Making a bowl of $type $flavor";
	}	
	//echo makeyogurt("raspberry");
?>