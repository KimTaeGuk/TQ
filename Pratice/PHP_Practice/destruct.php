<?php
class MyDestructableClass{
	function __construct(){
		print "Construct";
		$this->name="MyDestructableClass";
	}
	function __destruct(){
		print "Destroy".$this->name;
	}
}
$obj=new MyDestructableClass();

?>