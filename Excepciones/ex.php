<?php
 
function div ($dividendo,$dividor)
{
  if ($dividor==0)
  {
    throw new Exception("No se puede dividir por cero");
  }
  if ($dividendo==3 && $dividor==2)
  {
    throw new Exception("No se puede dividir 3 entre 2");
  }
  return $dividendo / $dividor;
}

try
{
  echo "La division es:" . div (3,3);
  echo "La division es:" . div (8,0);
  echo "La division es:" . div (3,2);
}
catch (Exception $ex)
{
  echo "<br/>Ha habido una excepcion con mensaje: ". $ex->getMessage();
}



try
{
  echo "La division es:" . div (3,2);
}
catch (Exception $ex)
{
  echo "<br/>Ha habido una excepcion con mensaje: ". $ex->getMessage();
}
try
{
  echo "La division es:" . div (8,0);//-------->>>>>>>>
}
catch (Exception $ex1)
{
  echo "<br/>Ha habido una excepcion con mensaje: ". $ex1->getMessage();
}
try
{
  echo "<br/>La division es:" . div (7,2);  
}
catch (Exception $ex2)
{
  echo "<br/>Ha habido una excepcion con mensaje: ". $ex2->getMessage();
}


?>