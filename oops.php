<?php 
class pro { 
    protected $x = 500; 
    protected $y = 500; 
              
    // Subtraction Function 
    function sub()  
    { 
        echo $sum=$this->x-$this->y . "<br/>"; 
    }      
}  
  
// SubClass - Inherited Class 
class child extends pro { 
    protected $z = 10;
    function mul() //Multiply Function 
    { 
        echo $sub=$this->x*$this->y; 
    } 

}  
  
$obj= new child; 
$pro= new pro; 
$pro->sub(); 
$obj->sub(); 
$obj->mul(); 
?>
