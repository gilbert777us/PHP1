<?php
//require_once('Juego.php');

class Empleado
{
// Atributos
var  $nombre;
// Constructor
function Empleado ($nom)
{
  $this->nombre=$nom;
  echo "<br/>Empleado creado con nombre:".$this->nombre;
}
// Metodos
function vender($localEdus,$tipoPan)
{
  
  echo "<br/>El empleado ".$this->nombre." vende";
  return $localEdus->cogerPan($tipoPan);
}
function cobrar()
{
  return "<br/>El empleado ".$this->nombre." cobra";
}
}

?>