<?php 
	class Equation{ 
	      private $name_of_equation = "";
	      private $equation_values = "";
	      
	      public function __construct($name, $equation){
				$this->name_of_equation = $name;
				$this->equation_values = $equation;
		  }
		  
		  public function get_name_of_equation(){
				return $this->name_of_equation;
		  }
		  public function get_equation_values(){
				return $this->equation_values;
		  }
	}
?>
