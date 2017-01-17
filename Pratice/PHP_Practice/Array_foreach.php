<?php
	$a = array(1,2,3,17);

	foreach($a as $v){
	//	echo "Current value of \$a : $v \n";
	}


	$a = array (
		"one" => 1,
		"two" => 2,
		"three" => 3,
		"seventeen" => 17
		);

	foreach ($a as $k => $v) {
//		echo "\$a[$k] => $v";
	}

	$a = array();
	$a[0][0]="a";
	$a[0][1]="b";
	$a[1][0]="c";
	$a[1][1]="d";


	foreach($a as $v1){
		foreach($v1 as $v2){
			echo "$v2";
		}
	}
?>