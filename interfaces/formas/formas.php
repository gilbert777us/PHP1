<?php
//Define a new Interface for all 'shapes' to inherit
interface Shape {
  //Define the methods required for classes to implement
  public function getColor();
  public function setColor($color);    
  //Interfaces can't define common functions so we'll just
  
  meter que saque el numero de de lados y numero de vertices.
  //define a method for all implementations to define
  public function describe();
}
//Define a new 'Triangle' class that inherits from the
//'Shape' interface
class Triangle implements Shape {
  private $color = null;
  //Define the required methods defined in the abstract
  //class 'Shape'
  public function getColor() {
      return $this->color;
  }   
  //Note that the method signature matches the abstract
  // class with only one parameter
  public function setColor($color) {
      $this->color = $color;
  }   
  //Interface can't have common functions so they must be defined
  //within the child class
  public function describe() {
      return sprintf("I'm an %s %s\n", $this->getColor(), get_class($this));
  }   
}
//Instantiate the Triange class
$triangle = new Triangle();
//Set the color
$triangle->setColor('Orange');
//Print out the value of the describe common method
//provided by the abstract class
//Will print out out "I'm an Orange Triange"
print $triangle->describe();

?>