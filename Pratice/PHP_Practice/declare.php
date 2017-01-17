<?php
	function handler(){
		echo "hello<br />";
	}
	register_tick_function("handler");

	declare(ticks=1){
		$b=2;
	}

	echo $b;
?>