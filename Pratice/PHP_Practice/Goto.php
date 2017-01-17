<?php
error_reporting(E_ALL);

	for($i=0,$j=50; $i<100; $i++){
		while($j--){
			if($j==17) goto end;
		}
	}
	echo "i = $i";
	end : echo 'j hit 17';

	goto a;
	echo 'Foo';
	a: echo 'Bar';

	goto A;
	echo 'Foo';
	A: echo 'Baz';

?>