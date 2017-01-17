<?php
	class A{
		function foo(){
			if(isset($this)){
				echo '$this is defined (';
				echo get_class($this);
				echo ')';
			}	else {
				echo "\$thos is not exist";
			}
		}
	}

	class B {
		function bar(){
			A::foo();
		}
	}

	class MyClass {
		private $foo=false;
		public function __construct(){
			$this->foo=true;
			echo ($this->foo);
		}
	}

	$bar=new MyClass();
	//클래스를 생성한 후 기능을 실행하면 this 가 있지만 바로 실행을 하면 this가 나오지 않는다
	//되도록이면 클래스를 생성한 후 기능을 수행하는 -> 를 사용하자
	// //1
	// $a = new A();
	// $a->foo();
	// //2
	// A::foo();
	// //3
	// $b=new B();
	// $b->bar();
	// //4
	// B::bar();
?>