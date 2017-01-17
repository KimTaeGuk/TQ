<?php
	class BaseClass {
		function __construct() {
			printf("In BaseClass");
		}
	}
	class SubClass extends BaseClass {
		function __construct() {
			parent::__construct();
			printf("In SubClass".PHP_EOL);
		}
	}
	class OtherClass extends BaseClass {

	}

$obj=new BaseClass();
$obj=new SubClass();
$obj=new OtherClass();

?>