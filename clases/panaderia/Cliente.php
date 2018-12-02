<?php
require_once('Local.php');

class Cliente
{
// Atributos
var  $dinero;
var  $nombre;
// Constructor
function Cliente ($di,$nom)
{
  $this->dinero=$di;
  $this->nombre=$nom;
  echo "<br/>Cliente ".$this->nombre." creado con money:".$this->dinero;
}
// Metodos
function preguntar($localEdus,$tipoPan)
{ 
  return $localEdus->vender($tipoPan); 
}
}

?>