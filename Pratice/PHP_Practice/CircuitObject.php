<?php
	class MyClass {
		public $var1 = 'value 1';
		public $var2 = 'value 2';
		public $var3 = 'value 3';

		protected $protected='protected var';
		private $private='private var';

		function Iter(){
			foreach($this as $key => $value){
				print "$key=>$value";
			}
		}
	}

	$class=new MyClass();
	foreach($class as $key => $value){
		print "$key -> $value";
	}
	echo PHP_EOL;
	$class->Iter();
?>