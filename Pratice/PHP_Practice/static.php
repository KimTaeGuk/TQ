<?php
	class foo{
		public static $my_static='foo';

		public function staticValue(){
			return ($this->my_static);
		}
	}

	class Bar extends foo {
		public function fooStatic(){
			return parent::$my_static;
		}
	}

	// print foo::$my_static;

	// $foo = new foo();
	// print $foo->my_static;	//Undefined
	// print $foo->staticValue();

	// print $foo::$my_static;

	// print Bar::fooStatic();

	// $bar = new Bar();
	// print $bar->fooStatic();

	class a {
		static protected $test="class A";

		public function static_test(){
			echo static::$test;
			echo self::$test;
		}
	}

	class b extends a {
		static protected $test="class b";
	}

	$obj=new b();
	$obj->static_test();
?>