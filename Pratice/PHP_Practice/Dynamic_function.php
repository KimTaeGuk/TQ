<?php
	function foo($arg='Test'){
		echo "In bar() : ".$arg;
	}
	$func='foo';
	//foo();

	class foo {
		static $variable='static property ';
		static function Variable(){
			echo 'Method Variable called';
		}
	}

	//echo foo::$variable;
	//foo::Variable();

	class foo2{
		static function bar(){
			echo "bar";
		}
		function baz(){
			echo "baz";
		}
	}

	$func=array("Foo2","bar");
	$func();
	$func=array(new foo2,"baz");
	$func();
?>