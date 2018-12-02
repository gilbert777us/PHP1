<?php
require_once('Juego.php');
class Tragaperras extends Juego
{
// Atributos
var $tipo;
var $jackpot;
// Constructor
function Tragaperras ($nom,$ti,$jack)
{
$this->nombreJuego=$nom;
$this->tipo=$ti;
$this->jackpot=$jack;
echo "Tragaperras ".$this->nombreJuego." construida<br/>";
}
// Metodos
function arrancarJugada()
{
return "Manivela activada...";
}
}

?>