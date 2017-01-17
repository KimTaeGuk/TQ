<html>
<head>
</head>
<body>
<?php
	$makefoo = true;

	bar();

	if($makefoo){
		function foo(){
			echo "I don't exist untill program execution reaches me.";
		}
	}

	foo();

	function bar() {
		echo "I exist immediately upon program start";
	}

	function foo2() {
		function bar2(){
			echo "I don't exist until call function foo2()";
		}
	}

	foo2();
	bar2();

	function recursion($a){
		if($a <20){
			echo "$a";
			recursion($a+1);
		}
	}
	recursion(0);
?>
</body>
</html>