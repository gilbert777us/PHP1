<?php
require_once('Juego.php');

class Ruleta extends Juego
{
// Atributos
var $tipo;
var $nNumeros;
// Constructor
function Ruleta ($nom,$ti="ruleta",$nNum=37)
{
$this->nombreJuego=$nom;
$this->tipo=$ti;
$this->nNumeros=$nNum;
echo "Ruletaxx ".$this->nombreJuego." construido<br/>";
}
// Metodos
function arrancarAlnzamiento()
{
return "Lanzamos... no va más... ";
}
}

?>