<?php 
	class MyClass{
		const CONSTANT = 'constant value';

		function showConstant(){
			echo self::CONSTANT;
		}
	}
	// $a = new MyClass();
	// $a->showConstant();

	
?>