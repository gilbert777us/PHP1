<?php
//create function with an exception
function checkNum($number) {
  if($number>1) {
    throw new Exception("Value must be 1 or below");
  }
  return true;
}

function div ($a,$b)
{
 
 // si comentamos esto????
 if($b==0) {
    throw new Exception("No se puede dividir por cero");
  } 
  return $a/$b;
}
//trigger exception in a "try" block
try {
  
  echo div (8,0);
  
  //checkNum(2);
  //If the exception is thrown, this text will not be shown
  echo " <br/> Final de ejecucion";
}

//catch exception
catch(Exception $e) {
  echo 'El mensaje de la excepcion es: ' .$e->getMessage();
}
?>