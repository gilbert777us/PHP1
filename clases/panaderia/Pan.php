<?php
//require_once('Juego.php');

class Pan
{
// Atributos
var  $tipo;
// Constructor
function Pan ($ti)
{
$this->tipo=$ti;
echo "<br/>Pan creado de tipo:".$this->tipo;
}
// Metodos
function entregar()
{
  return $this;
}
}

?>