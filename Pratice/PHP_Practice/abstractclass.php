<?php
	abstract class AbstractClass {
		abstract protected function getValue();
		abstract protected function prefixValue($prefix);
			
		public function printOut(){
			print $this->getValue();
		}
	}

	class ConcreteClass1 extends AbstractClass {
		protected function getValue(){
			return "ConcreteClass1";
		}

		public function prefixValue($prefix){
			return "{$prefix}ConcreteClass1";
		}
	}
	class ConcreteClass2 extends AbstractClass {
		protected function getValue(){
			return "ConcreteClass2";
		}

		public function prefixValue($prefix){
			return "{$prefix}ConcreteClass2";
		}
	}	

	// $class1=new ConcreteClass1;
	// $class1->printOut();
	// echo $class1->prefixValue('Foo');
	// $class2=new ConcreteClass2;
	// $class2->printOut();
	// echo $class2->prefixValue('Foo');

abstract class AbstractClass2{
	abstract protected function prefixName($name);
}

class ConcreteClass extends AbstractClass2{
	public function prefixName($name, $separator="."){
		if($name == "Pacman"){
			$prefix="Mr";
		}	elseif($name =="Pacwoman"){
			$prefix="Mrs";
		}	else {
			$prefix="";
		}
		return "{$prefix}{$separator}{$name}";
	}
}
$class = new ConcreteClass;
echo $class->prefixName("Pacman");
echo $class->prefixName("Pacwoman");
?>