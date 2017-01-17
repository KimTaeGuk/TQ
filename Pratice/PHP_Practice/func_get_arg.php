<?php
	function foo(){
		$numargs = func_num_args();
		echo $numargs;
		if($numargs >=1){
			echo func_get_arg(0);
		}
	}
foo(1,2);
?>